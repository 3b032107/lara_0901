<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostsController extends Controller
{
    public function index()
    {
        //return view('admin.posts.index');
        $posts = Post::orderBy('created_at','DESC')->get();
        $data = ['posts' => $posts];
        return view('admin.posts.index',$data);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        //控制器驗證
        $this->validate($request,[
            'title' => 'required|max:50',
            'content' => 'required',
            'is_feature' => 'required|boolean', //請加入is_feature欄位的驗證規則
        ]);

        Post::create($request->all());
        return redirect()->route('admin.posts.index');
    }

    public function edit(Post $post)
    {
        $data = [
            'post' => $post,
        ];

        return view('admin.posts.edit',$data);
    }

    public function update(Request $request, Post $post)
    {
        $this->validate($request,[
            'title' => 'required|max:50',
            'content' => 'required',
            'is_feature' => 'required|boolean', //請加入is_feature欄位的驗證規則
        ]);
        $post->update($request->all());
        return redirect()->route('admin.posts.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
