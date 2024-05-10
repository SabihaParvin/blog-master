<?php

namespace App\Http\Controllers\frontend;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function blogAdd()
    {
        return view('frontend.pages.post.postForm');
    }

    public function blogStore(Request $request)
    {
        // Validate the request data
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
            'user_id'=>auth()->user()->id,
            'content' => $request->content,
            'image' => $fileName, 
        ]);

       
        return redirect()->route('frontend.home')->with('success', 'Blog posted successfully.');
    }

    public function postView($p_id)
    {
        $post=Post::find($p_id);
        return view('frontend.pages.post.postView',compact('post'));
    }

    public function myPost()
    {
        $user = auth()->user();
        $post = $user->posts;
        return view('frontend.pages.post.myPost',compact('post'));
    }

    public function delete($id)
    {
        $blog =Post::find($id);
        
        if ($blog) {
            $blog->delete();
        }
        notify()->success('Blog Deleted Successfully');
        return redirect()->back();
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('frontend.pages.post.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if ($post) {
            $fileName = $post->image;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
                $file->storeAs('/uploads', $fileName);
            }
        } {
            $post->update([
            'title' => $request->title,
            'user_id'=>auth()->user()->id,
            'content' => $request->content,
            'image' => $fileName, 
                
            ]);

            notify()->success('post updated successfully.');
            return redirect()->route('my.post');
}
    }
}