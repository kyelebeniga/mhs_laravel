<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    //
    function show(){
        $data = Movie::all();
        return view('home', ['movies'=>$data]);
    }
}
