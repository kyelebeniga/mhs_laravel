<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class RegisterController extends Controller
{
    //
    public function register(){
        return view('auth.register');
    }

    public function saveUser(Request $request){
        $user = User::where('name', $request['name'])->first();

        if($user){
            return response()->json(['exists' => 'User already exists']);
        }
        else{
            $user = new User;
            $user->name = $request->name;
            $user->password = $request->password;
        }
        $user->save();
        return response()->json(['success' => 'User Registered!']);
    }
}
