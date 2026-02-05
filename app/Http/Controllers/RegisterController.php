<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request as FacadesRequest;

class RegisterController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(RegisterRequest $request){
        $user=User::create([
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>$request->password
        ]);

        Auth::login($user);
        return redirect()->route('admin.dashboard');
    }
}
