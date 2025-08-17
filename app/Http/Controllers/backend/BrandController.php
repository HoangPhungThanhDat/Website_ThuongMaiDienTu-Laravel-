<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Brand::where('status', '!=', '0')
            ->orderBy('created_at', 'DESC')
            ->get();

        // Xử lý sort_order
        $htmlsortorder = '';
        foreach ($list as $row) {
            $htmlsortorder .= "<option value='".($row->sort_order + 1)."'> ".$row->name.'</option>';
        }

        return view('backend.brand.index', compact('list', 'htmlsortorder'));
    }

    public function trash()
    {
        $list = Brand::where('status', '=', 0)
            ->select('id', 'name', 'image', 'status', 'slug', 'sort_order', 'created_at', 'updated_at')
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('backend.brand.trash', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {

        $brand = new Brand();

        // Tên trường || tên của thẻ input name
        $brand->name = $request->name;
        $brand->slug = Str::of($request->name)->slug('-');
        $brand->description = $request->description;
        $brand->sort_order = $request->sort_order;
        $brand->status = $request->status;

        //Upload file
        if ($request->image) {
            $exten = $request->file('image')->extension();
            //Lấy đuôi file
            if (in_array($exten, ['png', 'jpg', 'jpeg', 'gif', 'webp'])) {
                $filename = $brand->slug.'.'.$exten;
                $request->image->move(public_path('images/brands'), $filename);
                $brand->image = $filename;
            }
        }

        $brand->created_at = date('Y-m-d H:i:s');
        $brand->created_by = Auth::id() ?? 1; //Id của người quản trị

        $brand->save();

        return redirect()->route('admin.brand.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('admin.brand.index');
        }

        return view('backend.brand.show', compact('brand'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('admin.brand.index');
        }
        $list = Brand::where('status', '!=', 0)
            ->select('id', 'name', 'sort_order')
            ->orderBy('created_at', 'DESC')
            ->get();

        $htmlparentid = '';
        $htmlsortorder = '';
        foreach ($list as $row) {
            if ($brand->parent_id == $row->id) {
                $htmlparentid .= "<option selected value='".$row->id."'>".$row->name.'</option>';
            } else {
                $htmlparentid .= "<option value='".$row->id."'>".$row->name.'</option>';
            }

            if ($brand->sort_order - 1 == $row->sort_order) {
                $htmlsortorder .= "<option selected value='".($row->sort_order + 1)."'>".$row->name.'</option>';
            } else {

                $htmlsortorder .= "<option value='".($row->sort_order + 1)."'>".$row->name.'</option>';
            }
        }

        return view('backend.brand.edit', compact('list', 'htmlparentid', 'htmlsortorder', 'brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('admin.brand.index');
        }

        $brand->name = $request->name;
        $brand->slug = Str::of($request->name)->slug('-');
        $brand->description = $request->description;
        $brand->sort_order = $request->sort_order;
        $brand->status = $request->status;

        //Upload file
        if ($request->image) {
            $exten = $request->file('image')->extension();
            //Lấy đuôi file
            if (in_array($exten, ['png', 'jpg', 'jpeg', 'gif', 'webp'])) {
                $filename = $brand->slug.'.'.$exten;
                $request->image->move(public_path('images/brands'), $filename);
                $brand->image = $filename;
            }
        }

        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->updated_by = Auth::id() ?? 1; //Id của người quản trị

        // Lưu vào csdl
        $brand->save();

        // Xử lý
        // Chuyển hướng trang
        return redirect()->route('admin.brand.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('admin.brand.index');
        }
        $brand->delete();

        return redirect()->route('admin.brand.trash');
    }

    public function status(string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('admin.brand.index');
        }
        $brand->status = ($brand->status == 1) ? 2 : 1;
        $brand->updated_at = date('Y-m-d H:i:s'); //ngày hệ thống
        $brand->updated_by = Auth::id() ?? 1; //id quản trị
        $brand->save();

        return redirect()->route('admin.brand.index');
    }

    public function delete(string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('admin.brand.index');
        }
        $brand->status = 0;
        $brand->updated_at = date('Y-m-d H:i:s'); //ngày hệ thống
        $brand->updated_by = Auth::id() ?? 1; //id quản trị

        $brand->save();

        return redirect()->route('admin.brand.index');
    }

    //restore

    public function restore(string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('admin.brand.index');
        }
        $brand->status = 2;
        $brand->updated_at = date('Y-m-d H:i:s'); //ngày hệ thống
        $brand->updated_by = Auth::id() ?? 1; //id quản trị

        $brand->save();

        return redirect()->route('admin.brand.trash');
    }
}
