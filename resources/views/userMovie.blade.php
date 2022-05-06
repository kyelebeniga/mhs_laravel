<link href="{{ asset('/css/userMovie.css') }}" rel="stylesheet">
<title>Movies | MHS</title>

@extends('master')

@section('content')
    <div class="content">
        <h1>Now Showing</h1>
        <div class="column">
            @foreach($movies as $movie)
                <div class="column">
                    <a href="#">
                        <img src="{{ asset('uploaded_img/'.$movie['image']) }}">
                        <p>{{$movie['title']}}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection