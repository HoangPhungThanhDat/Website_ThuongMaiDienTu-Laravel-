<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Models\ProductImage;
use Illuminate\Http\Request;

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
                'product.id',
                'product.name',
                'product.image',
                'product.status',
                'product.price',
                'product.pricesale',
                'product.quantity',
                'product.created_at',
                'product.updated_at',
                'product.slug',
                'category.name as categoryname',
                'brand.name as brandname'
            )
            ->orderBy('product.created_at', 'desc')
            ->get();

        return view('backend.product.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();

        return view('backend.product.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'detail'      => 'nullable|string',
            'price'       => 'required|numeric',
            'pricesale'   => 'nullable|numeric',
            'quantity'    => 'required|integer',
            'category_id' => 'required|exists:category,id',
            'brand_id'    => 'required|exists:brand,id',
            'status'      => 'required|in:1,2',
            'images.*'    => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Xử lý slug
        $slug = Str::slug($request->name, '-');

        $product = new Product();
        $product->name        = $request->name;
        $product->slug        = $slug;
        $product->description = $request->description;
        $product->detail      = $request->detail;
        $product->price       = $request->price;
        $product->pricesale   = $request->pricesale ?? 0;
        $product->quantity    = $request->quantity;
        $product->category_id = $request->category_id;
        $product->brand_id    = $request->brand_id;
        $product->status      = $request->status;
        $product->created_by  = auth()->id() ?? 1;

        $tempImages = [];

        // Upload ảnh
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $key => $file) {
                $ext = $file->extension();
                if (in_array($ext, ['png', 'jpg', 'jpeg', 'gif', 'webp'])) {
                    if ($key === 0) {
                        // Ảnh chính: slug + đuôi mở rộng
                        $filename = $slug . '.' . $ext;
                        $file->move(public_path('images/products'), $filename);
                        $product->image = $filename;
                    } else {
                        // Ảnh phụ: slug-index.ext (vd: iphone-15-1.jpg, iphone-15-2.jpg)
                        $filename = $slug . '-' . $key . '.' . $ext;
                        $file->move(public_path('images/products'), $filename);

                        $productImage = new ProductImage();
                        $productImage->image_path = $filename;
                        $tempImages[] = $productImage;
                    }
                }
            }
        }

        // Lưu sản phẩm
        $product->save();

        // Lưu các ảnh phụ vào bảng product_images
        if (!empty($tempImages)) {
            foreach ($tempImages as $img) {
                $img->product_id = $product->id;
                $img->save();
            }
        }

        return redirect()->route('admin.product.index')->with('success', 'Thêm sản phẩm thành công!');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with('images')->find($id);
    
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
        if (! $product) {
            return redirect()->route('admin.product.index');
        }

        $categories = Category::all();
        $brands = Brand::all();

        return view('backend.product.edit', compact('product', 'categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        $product = Product::with('images')->find($id);
        if (!$product) {
            return redirect()->route('admin.product.index');
        }
    
        // Cập nhật thông tin sản phẩm
        $slug = Str::slug($request->name, '-');
        $product->name        = $request->name;
        $product->slug        = $slug;
        $product->description = $request->description;
        $product->status      = $request->status;
        $product->category_id = $request->category_id;
        $product->brand_id    = $request->brand_id;
        $product->detail      = $request->detail;
        $product->price       = $request->price;
        $product->quantity    = $request->quantity;
        $product->pricesale   = $request->pricesale;
        $product->updated_by  = Auth::id() ?? 1;
        $product->updated_at  = now();
    
        $tempImages = [];
    
        // Nếu có upload hình mới
        if ($request->hasFile('images')) {
            // 🔹 Xóa hình phụ cũ
            foreach ($product->images as $img) {
                if (file_exists(public_path('images/products/' . $img->image_path))) {
                    unlink(public_path('images/products/' . $img->image_path));
                }
                $img->delete();
            }
    
            // 🔹 Upload hình mới
            $images = $request->file('images');
            foreach ($images as $key => $file) {
                $ext = $file->extension();
                if (in_array($ext, ['png', 'jpg', 'jpeg', 'gif', 'webp'])) {
                    if ($key === 0) {
                        // Ảnh chính
                        $filename = $slug . '.' . $ext;
                        $file->move(public_path('images/products'), $filename);
                        $product->image = $filename;
                    } else {
                        // Ảnh phụ
                        $filename = $slug . '-' . $key . '.' . $ext;
                        $file->move(public_path('images/products'), $filename);
    
                        $productImage = new ProductImage();
                        $productImage->image_path = $filename;
                        $tempImages[] = $productImage;
                    }
                }
            }
        }
    
        // Lưu sản phẩm
        $product->save();
    
        // Lưu ảnh phụ mới
        if (!empty($tempImages)) {
            foreach ($tempImages as $img) {
                $img->product_id = $product->id;
                $img->save();
            }
        }
    
        return redirect()->route('admin.product.index')->with('success', 'Cập nhật sản phẩm thành công!');
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
        if (! $product) {
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

        return view('backend.product.trash', compact('list'));
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
