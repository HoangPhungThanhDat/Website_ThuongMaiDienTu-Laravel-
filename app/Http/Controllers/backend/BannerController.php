<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Models\Banner;
use Illuminate\Support\Facades\Auth;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $list = Banner::where('status', '!=', '0')
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('backend.banner.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBannerRequest $request)
    {
        $banner = new Banner();

        // Tên trường || tên của thẻ input name
        $banner->name = $request->name;
        $banner->description = $request->description;
        $banner->link = $request->link;
        $banner->position = $request->position;
        $banner->status = $request->status;

        //Upload file
        if ($request->image) {
            $exten = $request->file('image')->extension();
            //Lấy đuôi file
            if (in_array($exten, ['png', 'jpg', 'jpeg', 'gif', 'webp'])) {
                $filename = $banner->slug.'.'.$exten;
                $request->image->move(public_path('images/banners'), $filename);
                $banner->image = $filename;
            }
        }

        $banner->created_at = date('Y-m-d H:i:s');
        $banner->created_by = Auth::id() ?? 1; //Id của người quản trị

        $banner->save();

        return redirect()->route('admin.banner.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }

        return view('backend.banner.show', compact('banner'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        $list = banner::where('status', '!=', 0)
            ->select('id', 'name')
            ->orderBy('created_at', 'DESC')
            ->get();
        $htmlparentid = '';
        $htmlsortorder = '';
        foreach ($list as $row) {
            if ($banner->parent_id == $row->id) {
                $htmlparentid .= "<option selected value='".$row->id."'>".$row->name.'</option>';
            } else {
                $htmlparentid .= "<option value='".$row->id."'>".$row->name.'</option>';
            }
        }

        return view('backend.banner.edit', compact('list', 'htmlparentid', 'htmlsortorder', 'banner'));

    }

    /**
     * Update the specified resource in storage.
     */
    // update cập nhật

    public function update(UpdateBannerRequest $request, string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }

        $banner->name = $request->name;
        $banner->description = $request->description;
        $banner->link = $request->link;
        $banner->position = $request->position;
        $banner->status = $request->status;
        //Upload file
        if ($request->image) {
            $exten = $request->file('image')->extension();
            //Lấy đuôi file
            if (in_array($exten, ['png', 'jpg', 'jpeg', 'gif', 'webp'])) {
                $filename = $banner->slug.'.'.$exten;
                $request->image->move(public_path('images/banners'), $filename);
                $banner->image = $filename;
            }
        }

        $banner->updated_at = date('Y-m-d H:i:s');
        $banner->updated_by = Auth::id() ?? 1; //Id của người quản trị

        // Lưu vào csdl
        $banner->save();

        // Xử lý
        // Chuyển hướng trang
        return redirect()->route('admin.banner.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        $banner->delete();

        return redirect()->route('admin.banner.trash');
    }

    //bật tắt
    public function status(string $id)
    {
        // Tìm kiếm danh mục và trả về 404 nếu không tìm thấy
        $banner = Banner::findOrFail($id);

        // Chuyển đổi trạng thái giữa 1 và 2
        $banner->status = ($banner->status == 1) ? 2 : 1;

        // Cập nhật thời gian và người cập nhật
        $banner->updated_at = now(); // Sử dụng helper now() của Laravel
        $banner->updated_by = Auth::id() ?? 1; // ID của quản trị

        // Lưu thay đổi
        $banner->save();

        // Chuyển hướng về trang danh sách danh mục
        return redirect()->route('admin.banner.index');
    }

    // xóa
    public function delete(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        $banner->status = 0;
        $banner->updated_at = date('Y-m-d H:i:s'); //ngày hệ thống
        $banner->updated_by = Auth::id() ?? 1; //id quản trị

        $banner->save();

        return redirect()->route('admin.banner.index');

    }

    // thùng rác banner
    public function trash()
    {
        $list = Banner::where('status', '=', 0)
            ->select('id', 'name', 'image', 'status')
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('backend.banner.trash', compact('list'));
    }

    // khôi phục banner
    public function restore(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        $banner->status = 2;
        $banner->updated_at = date('Y-m-d H:i:s'); //ngày hệ thống
        $banner->updated_by = Auth::id() ?? 1; //id quản trị

        $banner->save();

        return redirect()->route('admin.banner.trash');

    }
}
