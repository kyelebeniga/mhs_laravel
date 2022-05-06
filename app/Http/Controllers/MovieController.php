<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{

    public function show($var){
        $data = Movie::all();
        return view($var, ['movies'=>$data]);
    }
    //Displays the data from tbl movie
    // public function userShow(){
    //     $data = Movie::all();
    //     return view('userMovie', ['movies'=>$data]);
    // }
    // public function adminShow(){
    //     $data = Movie::all();
    //     return view('adminMovie', ['movies'=>$data]);
    // }
    public function home(){
        $data = Movie::all();
        return view('home', ['movies'=>$data]);
    }
}
