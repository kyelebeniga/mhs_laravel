<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function userLogin(Request $request){
        $credentials = $request->only('name', 'password');
        if(Auth::attempt($credentials)){
            return response()->json(['success' => 'Logged in!']);
        }
        else{
            return response()->json(['error' => 'Invalid credentials!']);
        }
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/login');
    }
}
