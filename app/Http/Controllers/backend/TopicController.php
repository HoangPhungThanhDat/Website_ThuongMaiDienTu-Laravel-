<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Topic::where('status', '!=', 0)
            ->select("id", "name", "slug", "description", "status", "created_at", "updated_at")
            ->orderBy('created_at', 'DESC')
            ->get();
        $htmlsortorder = "";
        foreach ($list as $row)
            $htmlsortorder .= "<option value='" . ($row->sort_order + 1) . "'> " . $row->name . "</option>";

        return view("backend.topic.index", compact('list', 'htmlsortorder'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTopicRequest $request)
    {

        $topic = new Topic();

        // Tên trường || tên của thẻ input name  
        $topic->name = $request->name;
        $topic->slug = Str::of($request->name)->slug('-');
        $topic->description = $request->description;
        $topic->status = $request->status;
        $topic->sort_order = $request->sort_order;


        $topic->created_at = date('Y-m-d H:i:s');
        $topic->created_by = Auth::id() ?? 1; //Id của người quản trị
        $topic->save();
        return redirect()->route('admin.topic.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    { {
            $topic = Topic::find($id);
            if ($topic == NULL)
                return redirect()->route('admin.topic.index');
            return view('backend.topic.show', compact('topic'));
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('admin.topic.index');
        }
        $list = Topic::where('status', '!=', 0)
            ->select("id", "name", "slug", "description", "status")
            ->orderBy('created_at', 'DESC')
            ->get();


        $htmlsortorder = "";
        foreach ($list as $row) {


            if ($topic->sort_order - 1 == $row->sort_order) {
                $htmlsortorder .= "<option selected value='" . ($row->sort_order + 1) . "'>" . $row->name . "</option>";
            } else {

                $htmlsortorder .= "<option value='" . ($row->sort_order + 1) . "'>" . $row->name . "</option>";
            }
        }
        return view("backend.topic.edit", compact("list", "htmlsortorder", "topic"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTopicRequest $request, string $id)
    {
        $topic = Topic::find($id);
        if ($topic == NULL)
            return redirect()->route('admin.topic.index');

        $topic->name = $request->name;
        $topic->slug = Str::of($request->name)->slug('-');
        $topic->description = $request->description;
        $topic->status = $request->status;
        $topic->sort_order = $request->sort_order;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = Auth::id() ?? 1; //Id của người quản trị


        // Lưu vào csdl
        $topic->save();

        // Xử lý
        // Chuyển hướng trang
        return redirect()->route('admin.topic.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('admin.topic.index');
        }
        $topic->delete();
        return redirect()->route('admin.topic.trash');
    }
    public function status(string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('admin.topic.index');
        }
        $topic->status = ($topic->status == 2) ? 1 : 2;
        $topic->updated_at = date('Y-m-d H:i:s'); //ngày hệ thống
        $topic->updated_by = Auth::id() ?? 1; //id quản trị
        $topic->save();
        return redirect()->route('admin.topic.index');
    }
    public function delete(string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('admin.topic.index');
        }
        $topic->status = 0;
        $topic->updated_at = date('Y-m-d H:i:s'); //ngày hệ thống
        $topic->updated_by = Auth::id() ?? 1; //id quản trị

        $topic->save();
        return redirect()->route('admin.topic.index');
    }
    public function trash()
    {
        $list = Topic::where('status', '=', 0)
            ->select("id", "name", "slug", "description", "status", "created_at", "updated_at")
            ->orderBy('created_at', 'DESC')
            ->get();

        return view("backend.topic.trash", compact("list"));
    }
    public function restore(string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('admin.topic.index');
        }
        $topic->status = 2;
        $topic->updated_at = date('Y-m-d H:i:s'); //ngày hệ thống
        $topic->updated_by = Auth::id() ?? 1; //id quản trị

        $topic->save();
        return redirect()->route('admin.topic.trash');
    }
}
