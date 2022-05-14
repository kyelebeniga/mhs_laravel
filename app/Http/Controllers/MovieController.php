<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Facades\File; 

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

    public function store(Request $request){
        // Uploads image to table
        if($image = $request->file('image')){
            $destinationPath = 'image/';
            $movieImage = $image->getClientOriginalName();
            $image->move($destinationPath, $movieImage);
            $input['image'] = "$movieImage";
        }
        if($banner = $request->file('banner')){
            $destinationPath = 'image/banner';
            $bannerImage = $banner->getClientOriginalName();
            $banner->move($destinationPath, $bannerImage);
            $input['banner'] = "$bannerImage";
        }

        Movie::updateOrCreate(['id' => $request->id], 
            [
            'title' => $request->title,
            'year' => $request->year,
            'rating' => $request->rating,
            'description' => $request->description,
            'duration' => $request->duration,
            'price' => $request->price,
            'image' => $input['image'],
            'banner' => $input['banner']
            ]
        );

        return response()->json(['success'=>'Movie saved successfully.']);
    }

    public function edit($id){
        $movie = Movie::find($id);
        return response()->json($movie);
    }

    // Deletes movie entry
    public function destroy($id){
        $image = Movie::where('id',$id)->first(['image']);
        File::delete('public/image/'.$image->image);

        $banner = Movie::where('id',$id)->first(['banner']);
        File::delete('public/image/'.$banner->banner);

        Movie::find($id)->delete();

        return response()->json(['success' => true]);
    }
}
