<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class LoginController
{
    public function create(){
        return view('auth.login');
    }
    public function store(Request $request){
        $check= Auth::attempt([
        
            'email'=>$request->email,
            'password'=>$request->password
        ]);

        
        
        if($check){
                $request->session()->regenerate();
                if(Auth::user()->role=="admin"){
                    return redirect()->route('admin.dashboard');
                }else{
                    return redirect()->route('client');
                }
            }else{
            return redirect()->back()->with("error","Email or password is incorrect");

        }
    }
}
