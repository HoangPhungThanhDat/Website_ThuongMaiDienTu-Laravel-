<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Product::where('product.status', '!=', 0)
            ->join('category', 'product.category_id', '=', 'category.id')
            ->join('brand', 'product.brand_id', '=', 'brand.id')
            ->select(
                "product.id",
                "product.name",
                "product.image",
                "product.status",
                "product.price",
                "product.pricesale",
                "product.quantity",
                "product.created_at",
                "product.updated_at",
                "product.slug",
                "category.name as categoryname",
                "brand.name as brandname"
            )
            ->orderBy('product.created_at', 'desc')
            ->get();
        return view("backend.product.index", compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();

        return view("backend.product.create", compact("categories", "brands"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product();

        // Tên trường || tên của thẻ input name  
        $product->name = $request->name;
        $product->slug = Str::of($request->name)->slug('-');
        $product->description = $request->description;
        $product->status = $request->status;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->detail = $request->detail;
        $product->price = $request->price;
        $product->quantity = $request->quantity; // Số lượng kho
        $product->pricesale = $request->pricesale;
        //Upload file
        if ($request->image) {
            $exten = $request->file("image")->extension();
            //Lấy đuôi file
            if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                $filename = $product->slug . "." . $exten;
                $request->image->move(public_path("images/products"), $filename);
                $product->image = $filename;
            }
        }

        $product->created_at = date('Y-m-d H:i:s');
        $product->created_by = Auth::id() ?? 1; //Id của người quản trị    
        $product->save();
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('admin.product.index');
        }
        return view('backend.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('admin.product.index');
        }

        $categories = Category::all();
        $brands = Brand::all();

        return view("backend.product.edit", compact("product", "categories", "brands"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        $product = Product::find($id);
        if ($product == NULL)
            return redirect()->route('admin.product.index');

        $product->name = $request->name;
        $product->slug = Str::of($request->name)->slug('-');
        $product->description = $request->description;
        $product->status = $request->status;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->detail = $request->detail;
        $product->price = $request->price;
        $product->quantity = $request->quantity; // Số lượng kho
        $product->pricesale = $request->pricesale;

        //Upload file
        if ($request->image) {
            $exten = $request->file("image")->extension();
            //Lấy đuôi file
            if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                $filename = $product->slug . "." . $exten;
                $request->image->move(public_path("images/products"), $filename);
                $product->image = $filename;
            }
        }

        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = Auth::id() ?? 1; //Id của người quản trị


        // Lưu vào csdl
        $product->save();

        // Xử lý
        // Chuyển hướng trang
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    // xóa vĩnh viễn trongg thùng rác
    public function destroy(string $id)


    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }


        // Cập nhật thời gian và người cập nhật
        $product->updated_at = Carbon::now();
        $product->updated_by = Auth::id() ?? 1; // ID của quản trị

        $product->save(); // Lưu

        // Chuyển hướng trang
        $product->forceDelete();

        return redirect()->route('admin.product.index');
    }


    /**
     * Toggle product status between active and inactive.
     */
    public function status(string $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('admin.product.index');
        }

        $product->status = ($product->status == 1) ? 2 : 1;
        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Cập nhật trạng thái sản phẩm thành công.');
    }


    // xóa sản phẩm 
    public function delete(string $id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }

        // Chuyển đổi trạng thái giữa 1 và 0
        $product->status = $product->status == 1 ? 0 : 1;

        // Cập nhật thời gian và người cập nhật
        $product->updated_at = Carbon::now();
        $product->updated_by = Auth::id() ?? 1; // ID của quản trị

        $product->save(); // Lưu

        // Chuyển hướng trang
        return redirect()->route('admin.product.index');
    }


    // thùng rác
    public function trash()
    {
        $list = Product::where('product.status', '=', 0)
            ->join('category', 'product.category_id', '=', 'category.id')
            ->join('brand', 'product.brand_id', '=', 'brand.id')
            ->select(
                'product.id',
                'product.name',
                'product.image',
                'product.status',
                'product.slug',
                'product.created_at',
                'product.updated_at',
                'product.price',
                'product.pricesale',
                'product.quantity',
                'category.name as categoryname',
                'brand.name as brandname'
            )
            ->orderBy('product.created_at', 'DESC')
            ->get();

        return view("backend.product.trash", compact("list"));
    }

    // khôi phục sản phẩm
    public function restore(string $id)
    {
        $product = product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }
        $product->status = 2;
        $product->updated_at = date('Y-m-d H:i:s'); //ngày hệ thống
        $product->updated_by = Auth::id() ?? 1; //id quản trị

        $product->save();
        return redirect()->route('admin.product.trash');
    }
}
