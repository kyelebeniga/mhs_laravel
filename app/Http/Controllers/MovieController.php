<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    //Displays the data from tbl movie
    function show(){
        $data = Movie::all();
        return view('home', ['movies'=>$data]);
    }
}
