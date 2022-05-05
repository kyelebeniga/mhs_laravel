<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    //
    public function register(){
        return view('register');
    }

    public function saveUser(Request $request){
        $user = User::where('name', $request['name'])->first();

        if($user){
            return response()->json(['exists' => 'User already exists']);
        }
        else{
            $user = new User;
            $user->name = $request['name'];
            $user->password = bcrypt($request['password']);
        }
        $user->save();
        return response()->json(['success' => 'User Registered!']);
    }
}
