<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    //index

    public function index()
    {
        $list = Menu::where('status', '!=', 0)
            ->select('id', 'name', 'link', 'sort_order', 'parent_id', 'status', 'type', 'position')
            ->orderBy('created_at', 'desc')
            ->get();
        $list_category = Category::where('status', '!=', 0)
            ->select('id', 'name')
            ->orderBy('created_at', 'desc')
            ->get();
        $list_brand = Brand::where('status', '!=', 0)
            ->select('id', 'name')
            ->orderBy('created_at', 'desc')
            ->get();
        $list_topic = Topic::where('status', '!=', 0)
            ->select('id', 'name')
            ->orderBy('created_at', 'desc')
            ->get();
        $list_page = Post::where([['status', '!=', 0], ['type', '=', 'page']])
            ->select('id', 'title')
            ->orderBy('created_at', 'desc')
            ->get();
        $htmltopicid = '';
        foreach ($list as $row) {
            $htmltopicid .= "<option value='".$row->id."'>".$row->name.'</option>';
        }

        return view('backend.menu.index', compact('list', 'list_category', 'list_brand', 'list_topic', 'list_page', 'htmltopicid'));
    }

    //trash

    public function trash()
    {
        $list = Menu::where('status', '=', 0)
            ->select('id', 'name', 'link', 'sort_order', 'parent_id', 'status', 'type', 'position')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('backend.menu.trash', compact('list'));
    }

    //create

    public function create()
    {
        //
    }

    //store

    public function store(Request $request)
    {
        //Upload file
        if (isset($request->createCategory)) {
            $listid = $request->categoryid;
            if ($listid) {
                foreach ($listid as $id) {
                    $category = Category::find($id);
                    if ($category != null) {
                        $menu = new Menu();
                        $menu->name = $category->name;
                        $menu->link = 'danh-muc/'.$category->slug;
                        $menu->sort_order = 0;
                        $menu->parent_id = 0;
                        $menu->type = 'category';
                        $menu->position = $request->postion;
                        $menu->table_id = $id;
                        $menu->created_at = date('Y-m-d H:i:s');
                        $menu->created_by = Auth::id() ?? 1;
                        $menu->status = $request->status;
                        $menu->save();
                    }
                }

                // Chuyển hướng trang
                return redirect()->route('admin.menu.index');
            } else {
                echo 'Không có';
            }
        }
        if (isset($request->createBrand)) {
            $listid = $request->brandid;
            if ($listid) {
                foreach ($listid as $id) {
                    $brand = Brand::find($id);
                    if ($brand != null) {
                        $menu = new Menu();
                        $menu->name = $brand->name;
                        $menu->link = 'thuong-hieu/'.$brand->slug;
                        $menu->sort_order = 0;
                        $menu->parent_id = 0;
                        $menu->type = 'brand';
                        $menu->position = $request->postion;
                        $menu->table_id = $id;
                        $menu->created_at = date('Y-m-d H:i:s');
                        $menu->created_by = Auth::id() ?? 1;
                        $menu->status = $request->status;
                        $menu->save();
                    }
                }

                // Chuyển hướng trang
                return redirect()->route('admin.menu.index');
            } else {
                echo 'Không có';
            }
        }
        if (isset($request->createTopic)) {
            $listid = $request->topicid;
            if ($listid) {
                foreach ($listid as $id) {
                    $topic = Topic::find($id);
                    if ($topic != null) {
                        $menu = new Menu();
                        $menu->name = $topic->name;
                        $menu->link = 'chu-de/'.$topic->slug;
                        $menu->sort_order = 0;
                        $menu->parent_id = 0;
                        $menu->type = 'topic';
                        $menu->position = $request->postion;
                        $menu->table_id = $id;
                        $menu->created_at = date('Y-m-d H:i:s');
                        $menu->created_by = Auth::id() ?? 1;
                        $menu->status = $request->status;
                        $menu->save();
                    }
                }

                // Chuyển hướng trang
                return redirect()->route('admin.menu.index');
            } else {
                echo 'Không có';
            }
        }
        if (isset($request->createPage)) {
            $listid = $request->pageid;
            if ($listid) {
                foreach ($listid as $id) {
                    $page = Post::where([['id', '=', $id], ['type', '=', 'page']])->first();
                    if ($page != null) {
                        $menu = new Menu();
                        $menu->name = $page->title;
                        $menu->link = 'trang-don/'.$page->slug;
                        $menu->sort_order = 0;
                        $menu->parent_id = 0;
                        $menu->type = 'page';
                        $menu->position = $request->postion;
                        $menu->table_id = $id;
                        $menu->created_at = date('Y-m-d H:i:s');
                        $menu->created_by = Auth::id() ?? 1;
                        $menu->status = $request->status;
                        $menu->save();
                    }
                }

                // Chuyển hướng trang
                return redirect()->route('admin.menu.index');
            } else {
                echo 'Không có';
            }
        }
        if (isset($request->createCustom)) {
            if (isset($request->name, $request->link)) {
                $menu = new Menu();
                $menu->name = $request->name;
                $menu->link = $request->link;
                $menu->sort_order = 0;
                $menu->parent_id = 0;
                $menu->type = 'custom';
                $menu->position = $request->postion;
                $menu->created_at = date('Y-m-d H:i:s');
                $menu->created_by = Auth::id() ?? 1;
                $menu->status = $request->status;
                $menu->save();

                return redirect()->route('admin.menu.index');
            }

        }
    }

    //show

    public function show(string $id)
    {

        $menu = Menu::find($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }

        return view('backend.menu.show', compact('menu'));

    }

    //edit

    public function edit(string $id)
    {
        $menu = Menu::find($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }
        $list = Menu::where('status', '!=', 0)
            ->select('id', 'name', 'link', 'sort_order', 'parent_id', 'status', 'type', 'position')
            ->orderBy('created_at', 'desc')
            ->get();
        $list_category = Category::where('status', '!=', 0)
            ->select('id', 'name')
            ->orderBy('created_at', 'desc')
            ->get();
        $list_brand = Brand::where('status', '!=', 0)
            ->select('id', 'name')
            ->orderBy('created_at', 'desc')
            ->get();
        $list_topic = Topic::where('status', '!=', 0)
            ->select('id', 'name')
            ->orderBy('created_at', 'desc')
            ->get();
        $list_page = Post::where([['status', '!=', 0], ['type', '=', 'page']])
            ->select('id', 'title')
            ->orderBy('created_at', 'desc')
            ->get();
        $htmltopicid = '';
        foreach ($list as $row) {
            if ($menu->parent_id == $row->id) {
                $htmltopicid .= "<option selected value='".$row->id."'>".$row->name.'</option>';
            } else {
                $htmltopicid .= "<option value='".$row->id."'>".$row->name.'</option>';
            }
        }

        //chuyển hướng trang
        return view('backend.menu.edit', compact('menu', 'list', 'htmltopicid', 'list_category', 'list_brand', 'list_topic', 'list_page', 'htmltopicid'));
    }

    //update
    public function update(UpdateMenuRequest $request, string $id)
    {
        //
        //Lấy thông tin và lưu vào CSDL
        $menu = Menu::find($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }
        $menu->name = $request->name;
        $menu->link = $request->link;
        $menu->sort_order = 0;
        $menu->parent_id = 0;
        $menu->type = 'custom';
        $menu->position = $request->position;
        $menu->table_id = $id;

        $menu->status = $request->status;

        $menu->updated_at = date('Y-m-d H:i:s'); //Ngày hệ thống
        $menu->updated_by = Auth::id() ?? 1;

        $menu->save(); //lưu vào csdl

        //chuyển hướng trang
        return redirect()->route('admin.menu.index');
    }

    //destroy

    public function destroy(string $id)
    {
        $menu = Menu::find($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }
        $menu->delete(); //xóa khỏi CSDL

        //chuyển hướng
        return redirect()->route('admin.menu.trash');
    }

    //status

    public function status(string $id)
    {
        $menu = Menu::find($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }
        $menu->status = ($menu->status == 1) ? 2 : 1;
        $menu->updated_at = date('Y-m-d H:i:s'); //Ngày hệ thống
        $menu->updated_by = Auth::id() ?? 1;
        $menu->save(); //lưu vào csdl

        return redirect()->route('admin.menu.index');
    }

    //delete

    public function delete(string $id)
    {
        $menu = Menu::find($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }
        $menu->status = 0;
        $menu->updated_at = date('Y-m-d H:i:s'); //Ngày hệ thống
        $menu->updated_by = Auth::id() ?? 1;
        $menu->save(); //lưu vào csdl

        return redirect()->route('admin.menu.index');
    }

    //restore

    public function restore(string $id)
    {
        $menu = Menu::find($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }
        $menu->status = 2;
        $menu->updated_at = date('Y-m-d H:i:s'); //Ngày hệ thống
        $menu->updated_by = Auth::id() ?? 1;
        $menu->save(); //lưu vào csdl

        return redirect()->route('admin.menu.trash');
    }
}
