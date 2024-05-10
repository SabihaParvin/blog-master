<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function loginForm()
    {
        return view('admin.login');
    }

    public function loginpost(Request $request)
    {
        // dd($request->all());

        $validate = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required|min:6'
            ]
        );

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        }
        $credentials = $request->except('_token');

        // if(auth()->attempt($credentials))

        $login = auth()->attempt($credentials);
        //dd($credentials);
        if ($login) {
            return redirect()->route('dashboard');
        }

        return redirect()->back()->withErrors('invalid user email or password');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route("admin.login");
    }

    public function list()
    {
        $users=User::where('role','author')->get();
        return view('admin.pages.user.list',compact('users'));
    }

    public function delete($id)
    {
        $users =User::find($id);
        
        if ($users) {
            $users->delete();
        }
        notify()->success('User Deleted Successfully');
        return redirect()->back();
    }

    public function edit($id)
    {
        $users = User::find($id);
        return view('admin.pages.user.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $users = User::find($id);
        if ($users) {
            $fileName = $users->image;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
                $file->storeAs('/uploads', $fileName);
            }
        } {
            $users->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'image'=>$fileName,
                'role'=>'author',
                'phone_no'=>$request->phone,
                
            ]);

            notify()->success('Users updated successfully.');
            return redirect()->route('users.list');
        }
    }

}
