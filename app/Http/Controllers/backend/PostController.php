<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Post::where('post.status', '!=', 0)
            ->join('topic', 'post.topic_id', '=', 'topic.id')
            ->select("post.id", "post.slug", "post.type", "post.title", "post.image", "post.status", "topic.name as topicname", "post.created_at", "post.updated_at")
            ->orderBy('post.created_at', 'desc')
            ->get();
        return view("backend.post.index", compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $topics = Topic::all();

        return view("backend.post.create", compact("topics"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post();

        // Tên trường || tên của thẻ input name  
        $post->title = $request->title;
        $post->slug = Str::of($request->name)->slug('-');
        $post->description = $request->description;
        $post->status = $request->status;
        $post->topic_id = $request->topic_id;
        $post->detail = $request->detail;

        //Upload file
        if ($request->image) {
            $exten = $request->file("image")->extension();
            //Lấy đuôi file
            if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                $filename = $post->slug . "." . $exten;
                $request->image->move(public_path("images/posts"), $filename);
                $post->image = $filename;
            }
        }

        $post->created_at = date('Y-m-d H:i:s');
        $post->created_by = Auth::id() ?? 1; //Id của người quản trị    
        $post->save();
        return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect()->route('admin.post.index');
        }
        return view('backend.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect()->route('admin.post.index');
        }

        $topics = Topic::all();

        return view("backend.post.edit", compact("post", "topics"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return redirect()->route('admin.post.index');
        }

        // Gán giá trị từ request cho các thuộc tính của post
        $post->title = $request->title;
        $post->slug = Str::of($request->title)->slug('-'); // Đảm bảo tên trường đúng
        $post->description = $request->description;
        $post->status = $request->status;
        $post->topic_id = $request->topic_id;
        $post->detail = $request->detail; // Đảm bảo rằng bạn gán giá trị cho detail

        // Xử lý upload file hình ảnh
        if ($request->hasFile('image')) {
            $exten = $request->file("image")->extension();
            if (in_array($exten, ["png", "jpg", "jpeg", "gif", "webp"])) {
                $filename = $post->slug . "." . $exten;
                $request->file('image')->move(public_path("images/posts"), $filename);
                $post->image = $filename;
            }
        }

        // Gán giá trị cho các thuộc tính updated_at và updated_by
        $post->updated_at = now();
        $post->updated_by = Auth::id() ?? 1;

        // Lưu đối tượng post vào cơ sở dữ liệu
        $post->save();

        // Chuyển hướng về trang danh sách post
        return redirect()->route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('admin.post.index');
        }
        $post->delete();
        return redirect()->route('admin.post.trash');
    }
    // trạng thái 
    public function status(string $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect()->route('admin.post.index');
        }

        $post->status = ($post->status == 2) ? 1 : 2;
        $post->save();

        return redirect()->route('admin.post.index')->with('success', 'Cập nhật trạng thái sản phẩm thành công.');
    }
    //xóa bài viết 
    public function delete(string $id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('admin.post.index');
        }

        // Chuyển đổi trạng thái giữa 1 và 0
        $post->status = $post->status == 1 ? 0 : 1;

        // Cập nhật thời gian và người cập nhật
        $post->updated_at = Carbon::now();
        $post->updated_by = Auth::id() ?? 1; // ID của quản trị

        $post->save(); // Lưu

        // Chuyển hướng trang
        return redirect()->route('admin.post.index');
    }
    //thùng rác bài viết 
    public function trash()
    {
        $list = Post::where('post.status', '=', 0)
            ->join('topic', 'post.topic_id', '=', 'topic.id')
            ->select("post.id", "post.title", "post.image", "post.status", "post.slug", "post.type", "post.created_at", "post.updated_at", "topic.name as topicname")
            ->orderBy('post.created_at', 'DESC')
            ->get();

        return view("backend.post.trash", compact("list"));
    }
    //khôi phục thùn rác 
    public function restore(string $id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('admin.post.index');
        }
        $post->status = 2;
        $post->updated_at = date('Y-m-d H:i:s'); //ngày hệ thống
        $post->updated_by = Auth::id() ?? 1; //id quản trị

        $post->save();
        return redirect()->route('admin.post.trash');
    }
}
