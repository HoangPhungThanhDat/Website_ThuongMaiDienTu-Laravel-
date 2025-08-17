<?php



namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Log;


use Carbon\Carbon;



class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Category::where('status', '!=', 0)
            ->select("id", "name", "image", "status", "slug", "sort_order","created_at", "updated_at")
            ->orderBy('created_at', 'DESC')
            ->get();
        $htmlparentid = "";
        $htmlsortorder = "";
        foreach ($list as $row) {
            $htmlparentid .= "<option value='" . $row->id . "'>" . $row->name . "</option>";
            $htmlsortorder .= "<option value='" . ($row->sort_order + 1) . "'>Sau:" . $row->name . "</option>";
        }

        return view("backend.category.index", compact("list", "htmlparentid", "htmlsortorder"));
    }

    //-------------------------------------------------------------------------------------
    public function trash()
    {
        $list = Category::where('status', '=', 0)
            ->select("id", "name", "image", "status", "slug", "sort_order", "created_at", "updated_at")
            ->orderBy('created_at', 'DESC')
            ->get();


        return view("backend.category.trash", compact("list"));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->slug = Str::of($request->name)->slug('-');
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        $category->sort_order = $request->sort_order;

        //UPLOAD FILE
        if ($request->image) {
            $exten = $request->file("image")->extension();
            if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                $filename = $category->slug . "." . $exten;
                $request->image->move(public_path("images/category"), $filename);
                $category->image = $filename;
            }
        }
        $category->status = $request->status;

        $category->created_at = date('Y-m-d H:i:s'); //ngay 
        $category->created_by = Auth::id() ?? 1; // id cua quan tri 

        $category->save(); // luu
        //chuyen huong trang 
        return redirect()->route("admin.category.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    { {
            $category = Category::find($id);
            if ($category == NULL)
                return redirect()->route('admin.category.index');
            return view('backend.category.show', compact('category'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }
        $list = Category::where('status', '!=', 0)
            ->select("id", "name", "sort_order")
            ->orderBy('created_at', 'DESC')
            ->get();

        $htmlparentid = "";
        $htmlsortorder = "";
        foreach ($list as $row) {
            if ($category->parent_id == $row->id) {
                $htmlparentid .= "<option selected value='" . $row->id . "'>" . $row->name . "</option>";
            } else {
                $htmlparentid .= "<option value='" . $row->id . "'>" . $row->name . "</option>";
            }
            if ($category->sort_order - 1 == $row->sort_order) {
                $htmlsortorder .= "<option  selected value='" . ($row->sort_order + 1) . "'>Sau:" . $row->name . "</option>";
            } else {
                $htmlsortorder .= "<option value='" . ($row->sort_order + 1) . "'>Sau:" . $row->name . "</option>";
            }
        }

        return view("backend.category.edit", compact("category", "list", "htmlparentid", "htmlsortorder"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }
        $category->name = $request->name;
        $category->slug = Str::of($request->name)->slug('-');
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        $category->sort_order = $request->sort_order;

        //UPLOAD FILE
        if ($request->image) {
            $exten = $request->file("image")->extension();
            if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                $filename = $category->slug . "." . $exten;
                $request->image->move(public_path("images/category"), $filename);
                $category->image = $filename;
            }
        }

        //end load file
        $category->status = $request->status;
        $category->updated_at = date('Y-m-d H:i:s'); //ngay 
        $category->updated_by = Auth::id() ?? 1; // id cua quan tri 

        $category->save(); // luu
        //chuyen huong trang 
        return redirect()->route("admin.category.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)


    {
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }


        // Cập nhật thời gian và người cập nhật
        $category->updated_at = Carbon::now();
        $category->updated_by = Auth::id() ?? 1; // ID của quản trị

        $category->save(); // Lưu

        // Chuyển hướng trang
        $category->forceDelete();

        return redirect()->route('admin.category.index');
    }

    //status
    public function status(string $id)
    {
        // Tìm kiếm danh mục và trả về 404 nếu không tìm thấy
        $category = Category::findOrFail($id);

        // Chuyển đổi trạng thái giữa 1 và 2
        $category->status = ($category->status == 1) ? 2 : 1;

        // Cập nhật thời gian và người cập nhật
        $category->updated_at = now(); // Sử dụng helper now() của Laravel
        $category->updated_by = Auth::id() ?? 1; // ID của quản trị

        // Lưu thay đổi
        $category->save();

        // Chuyển hướng về trang danh sách danh mục
        return redirect()->route('admin.category.index');
    }




    public function delete(string $id)
    {
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }

        // Chuyển đổi trạng thái giữa 1 và 0
        $category->status = $category->status == 1 ? 0 : 1;

        // Cập nhật thời gian và người cập nhật
        $category->updated_at = Carbon::now();
        $category->updated_by = Auth::id() ?? 1; // ID của quản trị

        $category->save(); // Lưu

        // Chuyển hướng trang
        return redirect()->route('admin.category.index');
    }


    //retore
    public function restore(string $id)
    {
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }
        $category->status = 2;
        $category->updated_at = date('Y-m-d H:i:s'); //ngày hệ thống
        $category->updated_by = Auth::id() ?? 1; //id quản trị

        $category->save();
        return redirect()->route('admin.category.trash');
    }
}
