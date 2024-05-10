<?php

namespace App\Http\Controllers\frontend;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function commentAdd($p_id)
    {
        $post = Post::find($p_id);
        return view('frontend.pages.comment.comment', compact('post'));
    }
    public function store(Request $request, $post_id)
    {
        $request->validate([
            'text' => 'required|string|max:255',
            'post_id' => 'required|exists:posts,id', // Ensure post_id exists in posts table
        ]);
    
        Comment::create([
            'text' => $request->text,
            'user_id' => auth()->user()->id,
            'post_id' => $post_id,
        ]);
        notify()->success('Comment added successfully!');
        return redirect()->back();
}

public function delete($id)
    {
        $comment =Comment::find($id);
        
        if ($comment) {
            $comment->delete();
        }
        notify()->success('Comment Deleted Successfully');
        return redirect()->back();
    }

    public function edit($id)
{
    $comment=Comment::find($id);
    return view('frontend.pages.comment.comment',compact('comment'));
}

public function update(Request $request, $id)
    {
        $comment=Comment::find($id);
        
         {
            $comment->update([
            'text' => $request->text,     
            ]);

            notify()->success('Comment updated successfully.');
            return redirect()->route('my.post');
}
    }
}