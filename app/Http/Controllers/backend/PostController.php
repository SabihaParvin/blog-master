<?php

namespace App\Http\Controllers\backend;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function list()
    {
        $post = Post::all();
        return view('admin.pages.post.list', compact('post'));
    }

    public function form()
    {
        return view('admin.pages.post.form');
    }

    public function addPost(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        $fileName = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('/uploads', $fileName);
        }


        Post::create([
            'title' => $request->title,
            'user_id' => auth()->user()->id,
            'content' => $request->content,
            'image' => $fileName,
        ]);
        notify()->success('post added');
        return redirect()->route('post.list');
    }

    public function delete($id)
    {
        $post =Post::find($id);
        
        if ($post) {
            $post->delete();
        }
        notify()->success('Blog Deleted Successfully');
        return redirect()->back();
    }
}
