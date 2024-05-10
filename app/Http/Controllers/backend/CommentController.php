<?php

namespace App\Http\Controllers\backend;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function list()
    {
        $comment = Comment::all();
        return view('admin.pages.comment.list', compact('comment'));
    }

    public function delete($id)
    {
        $comment =Comment::find($id);
        
        if ($comment) {
            $comment->delete();
        }
        notify()->success('comment Deleted Successfully');
        return redirect()->back();
}
}
