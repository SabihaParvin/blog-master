<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function registration()
    {
        return view('frontend.pages.registration');
    }

    public function store(Request $request)
    {

    // dd($request->all());
    User::Create([
        'name'=>$request->name,
        'email'=>$request->email,
        'role'=>'author',
        'phone_no'=>$request->phone,
        'password'=>bcrypt($request->password),
    ]);

    notify()->success('Registration successful.');
    return redirect()->route('user.login');
    }

    public function login()
    {
        return view('frontend.pages.login');
    }

    public function loginpost(Request $request)
    {
        $val=Validator::make($request->all(),[
            'email'=>'required',
            'password'=>'required|min:6'
        ]);
        if($val->fails())
        {
            notify()->error($val->getMessageBag());
            return redirect()->back();
        }

        $credentials=$request->except('_token');
        // dd($credentials);

        if(auth()->attempt($credentials))
        {
            notify()->success('Login Successfull');
            return redirect()->route('frontend.home');
        }
        
        notify()->error('Invalid Credentials.');
            return redirect()->back();
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('frontend.home');
    }

}
