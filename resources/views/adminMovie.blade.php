<title>Movies | MHS</title>
<link href="{{ asset('/css/adminMovie.css') }}" rel="stylesheet">

@extends('master')

@section('content')
    <section class="banner">
        <h1>Movies</h1>
        <button class="open-button" onclick="openForm()">Add Submission</button>
        <div class="container">

        </div>
    </section>

    {{-- Movie Table --}}
    <section class="movie-list">
        <div class="movie-display">
            <table class="movie-table" id="movie-table">
                <thead>
                    <tr>
                        <th class="poster">Poster</th>
                        <th>Title</th>
                        <th class="table-desc">Description</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                @foreach($movies as $movie)
                    <tr>
                        <td><a href="#"><img src="{{ asset('uploaded_img/'.$movie['image']) }}" height="300" width="200" alt=""></a></td>
                        <td><a href="#">{{$movie->title}} <br>$ {{$movie->price}} </a></td>
                        <td class="table-desc-content">{{$movie->description}}</td>
                        <td>
                            <div class="buttons">
                                <a href="#" class="btn"><i class="fas fa-edit"></i>Edit</a>
                                <button class="deleteBtn"><i class="fas fa-trash"></i>Delete</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </section>
@endsection