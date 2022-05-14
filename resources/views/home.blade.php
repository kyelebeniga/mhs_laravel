<link href="{{ asset('/css/home.css') }}" rel="stylesheet">
<title>Home | MHS</title>

@extends('master')

@section('content')
    <section class="banner">
        <h1>Now Showing</h1>
        <div id="carousel">
            <div class="slick">
                @foreach($movies as $movie)
                    <div class="now-showing">
                        <a href="moviepage/{{$movie['id']}}"><img src="{{ asset('image/'.$movie['image']) }}"></a>
                        <p>{{$movie['title']}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $(document).ready(() => {
            $('#carousel .slick').slick({
                dots:true,
                autoplay: true,
                autoplaySpeed: 6000,
                speed: 500,
            });
        });
    </script>
@endsection