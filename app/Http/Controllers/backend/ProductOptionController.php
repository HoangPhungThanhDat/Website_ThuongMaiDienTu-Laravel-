<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProductOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = ProductOption::with('product')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('backend.ProductOption.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('backend.ProductOption.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:product,id',
            'color'      => 'required|string|max:50',
            'storage_gb'    => 'required|string|max:50',
            'price_adjust' => 'required|numeric',
            'pricesale'  => 'nullable|numeric',
            'quantity'   => 'required|integer',
            'status'     => 'required|in:1,2',
            'image'      => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $option = new ProductOption();
        $option->product_id = $request->product_id;
        $option->color      = $request->color;
        $option->storage_gb  = $request->storage_gb; 
        $option->price_adjust = $request->price_adjust;
        $option->pricesale   = $request->pricesale ?? 0;
        $option->quantity   = $request->quantity;
        $option->status     = $request->status;

        // Upload hình riêng cho option
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->extension();
            $filename = Str::slug($request->color . '-' . $request->storage) . '.' . $ext;
            $file->move(public_path('images/ProductOption'), $filename);
            $option->image = $filename;
        }

        $option->save();

        return redirect()->route('admin.ProductOption.index')->with('success', 'Thêm phân loại sản phẩm thành công!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $option = ProductOption::findOrFail($id);
        $products = Product::all();

        return view('backend.ProductOption.edit', compact('option', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $option = ProductOption::findOrFail($id);

        $request->validate([
            'product_id' => 'required|exists:product,id',
            'color'      => 'required|string|max:50',
            'storage_gb'    => 'required|string|max:50',
            'price_adjust' => 'required|numeric',
            'pricesale'  => 'nullable|numeric',
            'quantity'   => 'required|integer',
            'status'     => 'required|in:1,2',
            'image'      => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $option->product_id = $request->product_id;
        $option->color      = $request->color;
        $option->storage_gb  = $request->storage_gb; 
        $option->price_adjust = $request->price_adjust;
        $option->pricesale   = $request->pricesale ?? 0;
        $option->quantity   = $request->quantity;
        $option->status     = $request->status;

        // Nếu upload hình mới, xóa hình cũ
        if ($request->hasFile('image')) {
            if ($option->image && file_exists(public_path('images/ProductOption/' . $option->image))) {
                unlink(public_path('images/ProductOption/' . $option->image));
            }
            $file = $request->file('image');
            $ext = $file->extension();
            $filename = Str::slug($request->color . '-' . $request->storage) . '.' . $ext;
            $file->move(public_path('images/ProductOption'), $filename);
            $option->image = $filename;
        }

        $option->save();

        return redirect()->route('admin.ProductOption.index')->with('success', 'Cập nhật phân loại sản phẩm thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $option = ProductOption::findOrFail($id);
        if ($option->image && file_exists(public_path('images/ProductOption/' . $option->image))) {
            unlink(public_path('images/ProductOption/' . $option->image));
        }
        $option->delete();

        return redirect()->route('admin.ProductOption.index')->with('success', 'Xóa phân loại sản phẩm thành công!');
    }

    /**
     * Toggle status.
     */
    public function status($id)
    {
        $option = ProductOption::findOrFail($id);
        $option->status = $option->status == 1 ? 2 : 1;
        $option->save();

        return redirect()->route('admin.ProductOption.index')->with('success', 'Cập nhật trạng thái thành công!');
    }

    public function show(string $id)
    {
        $option = ProductOption::with('product')->findOrFail($id);
        if (!$option) {
            return redirect()->route('admin.ProductOption.index');
        }
    
        return view('backend.ProductOption.show', compact('option'));
    }
}
