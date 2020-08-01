<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class UserController extends Controller
{
    public function getSignup()
    {
        return view('users.signup');

    }
    public function postSignup(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required|unique:users',
            'password' => 'required|min:4'
        ]);

        $user = new User([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
        $user->save();      
        Auth::login($user); 
        return redirect()->route('users.profile');
    }

    public function getSignin()
    {
        return view('users.signin');

    }

    public function postSignin(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required|min:4'
        ]);

        $user = new User([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
       if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
           return redirect()->route('users.profile');
       }
       return redirect()->back();
    
    }

    public function getProfile()
    {
        return view('users.profile');

    }
    
    public function getLogout()
    {
        Auth::logout();
       return redirect()->back();
    }


    
}
