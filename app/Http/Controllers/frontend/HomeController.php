<?php

namespace App\Http\Controllers\frontend;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        $users=User::all();
        $post=Post::latest()->get();
        return view('frontend.pages.home',compact('post','users'));
    }

    public function about()
    {
        
        return view('frontend.pages.about');
    }

  
    }


