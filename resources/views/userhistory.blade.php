<title>History | MHS</title>
<link href="{{ asset('/css/userhistory.css') }}" rel="stylesheet">
@extends('master')

@section('content')
    <div class="container">
        <h1 class="history">History</h1>
        <div class="main">
            @foreach($tickets as $ticket)
                <div>
                    <img src="{{ asset('image/'.$ticket['image']) }}" alt="" class="movie-poster" height="175" width="116">
                    <div class="info">
                        <p class="title">{{ $ticket->title }}</p>
                        <p class="rating">{{ $ticket->year }} | {{ $ticket->rating }}</p>
                        <p class="rating">{{ $ticket->duration }}</p>
                        <p class="date">Date Purchased: <br>{{ $ticket->created_at->format('d M Y - g:i A') }}</p>
                        <div class="additional">
                            <p>Seat#: {{ $ticket->seat }}</p>
                            <p>Price: ${{ $ticket->price }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection