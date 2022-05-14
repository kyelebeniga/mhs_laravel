<title>Movies | MHS</title>
<link href="{{ asset('/css/adminMovie.css') }}" rel="stylesheet">

@extends('master')

@section('content')

{{-- Movie Admission --}}
    <section class="banner">
        <h1>Movies</h1>
        <button class="open-button" onclick="openForm()">Add Submission</button>
        <div class="container">
            <div class="form-popup" id="myForm">
                <form method="POST" enctype="multipart/form-data" class="form-container" id="movieForm">
                    <h3 id="formTitle">Add movie</h3>
                    <input type="text" placeholder="Movie Title" name="title" id="title" class="box">
                    <input type="text" placeholder="Year" name="year" id="year" class="box">
                    <input type="text" placeholder="Maturity Rating" name="rating" id="rating" class="box">
                    <input type="text" placeholder="Description" name="description" id="description" class="box">
                    <input type="text" placeholder="Duration" name="duration" id="duration" class="box">
                    <input type="text" placeholder="Price" name="price" id="price" class="box">
                    
                    <label for="image" class="imageLabel" id="imageLabel">Upload Poster</label>
                    <input type="file" accept="image/png, image/jpeg, image/jpg" name="image" id="image">
                    <script>
                    //Replaces "Upload Poster" with the file name of the user's uploaded image
                    $('#image').change(function(){
                        var i = $(this).prev('label').clone();
                        var file = $('#image')[0].files[0].name;
                        $(this).prev('label').text(file);
                    });
                    </script>

                    <label for="banner" class="bannerLabel" id="bannerLabel">Upload Banner</label>
                    <input type="file" accept="image/png, image/jpeg, image/jpg" name="banner" id="banner">
                    <script>
                    //Replaces "Upload Banner" with the file name of the user's uploaded image
                        $('#banner').change(function(){
                            var i = $(this).prev('label').clone();
                            var file = $('#banner')[0].files[0].name;
                            $(this).prev('label').text(file);
                        });
                        </script>
                    <input type="submit" class="btn" value="Submit">
                    <input type="button" class="btnCancel" onclick="closeForm()" value="Cancel">
                </form>
            </div>
            <div id="pageMask"></div>
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

    <script>
        function openForm(){
            document.getElementById("myForm").style.display = "block";
            document.getElementById("pageMask").style.display = "block";
        }
        function closeForm(){
            document.getElementById("myForm").style.display = "none";
            document.getElementById("pageMask").style.display = "none";
        }
    </script>
@endsection