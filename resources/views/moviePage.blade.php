
<title>{{ $movie->title }} | MHS</title>
<link href="{{ asset('/css/moviePage.css') }}" rel="stylesheet">

@extends('master')

@section('content')


    <div class="main-container">
        <div class="banner">
            <img src="{{ asset('image/banner/'.$movie['banner']) }}">
            <div class="banner-overlay"></div>
        </div>
        <div class="movie-content">
            <img src="{{ asset('image/'.$movie['image']) }}" alt="" class="movie-poster" height="300" width="200">
            <h1>{{ $movie->title }}</h1>
            <p>{{ $movie->rating }} | {{ $movie->year }} | {{ $movie->duration }}</p>
            <a href="#" class="btn"><i class="fa-solid fa-cart-shopping"></i> {{ $movie->price }}</a>
            <h1>Synposis: </h1>
            <p class="movie-desc">{{ $movie->description }}</p>
        </div>
    </div>

@endsection