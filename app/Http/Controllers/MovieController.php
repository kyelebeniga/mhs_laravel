<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{

    public function index($var){
        $data = Movie::all();
        return view($var, ['movies'=>$data]);
    }
    
    public function home(){
        $data = Movie::all();
        return view('home', ['movies'=>$data]);
    }
}
