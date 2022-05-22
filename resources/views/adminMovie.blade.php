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
                    @csrf 

                    <h3 id="movieModal">Add movie</h3>
                    
                    <input type="hidden" name="id" id="id">
                    <input type="text" placeholder="Movie Title" name="title" id="title" class="box" required>
                    <input type="text" placeholder="Year" name="year" id="year" class="box" required>
                    <input type="text" placeholder="Maturity Rating" name="rating" id="rating" class="box" required>
                    <input type="text" placeholder="Description" name="description" id="description" class="box" required>
                    <input type="text" placeholder="Duration" name="duration" id="duration" class="box" required>
                    <input type="text" placeholder="Price" name="price" id="price" class="box" required>
                    
                    <label for="image" class="imageLabel" id="imageLabel">Upload Poster</label>
                    <input type="file" accept="image/png, image/jpeg, image/jpg" name="image" id="image" required>
                    <script>
                    //Replaces "Upload Poster" with the file name of the user's uploaded image
                    $('#image').change(function(){
                        var i = $(this).prev('label').clone();
                        var file = $('#image')[0].files[0].name;
                        $(this).prev('label').text(file);
                    });
                    </script>

                    <label for="banner" class="bannerLabel" id="bannerLabel">Upload Banner (1920x550)</label>
                    <input type="file" accept="image/png, image/jpeg, image/jpg" name="banner" id="banner" required>
                    <script>
                    //Replaces "Upload Banner" with the file name of the user's uploaded image
                        $('#banner').change(function(){
                            var i = $(this).prev('label').clone();
                            var file = $('#banner')[0].files[0].name;
                            $(this).prev('label').text(file);
                        });
                        </script>
                    <input type="submit" class="btn" value="Submit" id="btnSave">
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
                        <td><a href="moviepage/{{$movie['id']}}"><img src="{{ asset('image/'.$movie['image']) }}" height="300" width="200" alt=""></a></td>
                        <td><a href="moviepage/{{$movie['id']}}">{{$movie->title}} <br>$ {{$movie->price}} </a></td>
                        <td class="table-desc-content">{{$movie->description}}</td>
                        <td>
                            <div class="buttons">
                                <a href="javascript:void(0)" class="btn" data-id="{{ $movie->id }}"><i class="fas fa-edit"></i>Edit</a>
                                <button href="javascript:void(0)" class="deleteBtn" data-id="{{ $movie->id }}"><i class="fas fa-trash"></i>Delete</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </section>

    {{-- AJAX script --}}
    <script>
         $(document).ready(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Creates Movie submission
            $('form').on('submit', function(e){
                e.preventDefault();

                $.ajax({
                    url: '{{ route('movies.store') }}',
                    type: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data){
                        $(".movie-table").load(location.href + " .movie-table");
                        $.notify('Success!', {position:"bottom right",className:"success"});
                        closeForm();
                    }
                });
            })

            //AJAX Update
            $('body').on('click', '.btn', function(){
                var id = $(this).data('id');
                openForm();
                $.get("{{ route('movies.index') }}" + '/' + id + '/edit', function(res){
                    $('#movieModal').html('Edit Movie');
                    $('#btnSave').val('Edit Movie');
                    $('#id').val(res.id);
                    $('#title').val(res.title);
                    $('#year').val(res.year);
                    $('#rating').val(res.rating);
                    $('#description').val(res.description);
                    $('#duration').val(res.duration);
                    $('#price').val(res.price);
                });
            });

            // AJAX Delete
            $('body').on('click', '.deleteBtn', function (e) {
                var id = $(this).data('id');
                e.preventDefault();
                
                $.ajax({
                    url: "{{ route('movies.store') }}"+'/'+id,                                                   
                    type: 'DELETE',                                  
                    success:function(res){
                        $(".movie-table").load(location.href + " .movie-table");
                        $.notify('Movie deleted.', {position:"bottom right"});
                    },
                    error: function (res) {
                        console.log('Error:', res);
                    }
                });
            });
        });
    </script>

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