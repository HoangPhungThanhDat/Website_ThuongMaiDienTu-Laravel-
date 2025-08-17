<?php

namespace App\Http\Controllers\fontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Topic;

class BaiVietController extends Controller
{
    public function index()
    {
        $list_post = Post::where('status', '=', 2)
            ->orderBy('created_at', 'desc')
            ->paginate(8);

        return view('fontend.baiviet', compact('list_post'));
    }

    public function detail($slug)
    {
        $post = Post::where([['status', '=', 2], ['slug', '=', $slug]])->first();
        $listcatid = $this->getlistpostid($post->topic_id);
        $list_post = Post::where([['status', '=', 2], ['id', '!=', $post->id]])
            ->whereIn('topic_id', $listcatid)
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();

        return view('fontend.baiviet_detail', compact('post', 'list_post'));
    }

    public function getlistpostid($rowid)
    {
        $listcatid = [];
        array_push($listcatid, $rowid);
        $list1 = Topic::where([['id', '=', $rowid], ['status', '=', 2]])->select('id')->get();
        if (count($list1) > 0) {
            foreach ($list1 as $row1) {
                array_push($listcatid, $row1->id);
                $list2 = Topic::where([['id', '=', $rowid], ['status', '=', 2]])->select('id')->get();
                if (count($list2) > 0) {
                    foreach ($list2 as $row2) {
                        array_push($listcatid, $row2->id);

                    }

                }
            }

        }

        return $listcatid;
    }

    // lay bai viet theo danh muc
    public function post_topic($slug)
    {
        $row = Topic::where([['slug', '=', $slug], ['status', '=', 2]])->select('id', 'name', 'slug')->first();
        $listcatid = [];
        if ($row != null) {
            $listcatid = $this->getlistpostid($row->id);

        }
        $list_post = Post::where('status', '=', 2)
            ->whereIn('topic_id', $listcatid)
            ->orderBy('created_at', 'desc')
            ->paginate(4);

        return view('fontend.baiviet_category', compact('list_post', 'row'));
    }
}
