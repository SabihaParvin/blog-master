<?php

namespace App\Http\Controllers\backend;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function dashboard()
    {
        $users=User::where('role','author')->count();
        $post=Post::count();
        $comment=Comment::count();
        return view('admin.dashboard',compact('users','post','comment'));
    }
}
