<title>History | MHS</title>
<link href="{{ asset('/css/userhistory.css') }}" rel="stylesheet">
@extends('master')

@section('content')
    <div class="main">
        @foreach($tickets as $ticket)
            <div>
                <img src="{{ asset('image/'.$ticket['image']) }}" alt="" class="movie-poster" height="175" width="116">
                <div class="info">
                    <p class="title">{{ $ticket->title }}</p>
                    <p class="rating">{{ $ticket->year }} | {{ $ticket->rating }}</p>
                    <p class="rating">{{ $ticket->duration }}</p>
                    <p>{{ $ticket->seat }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection