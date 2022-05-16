<link href="{{ asset('/css/ticket.css') }}" rel="stylesheet">
<title>Tickets | MHS</title>

@extends('master')

@section('content')
    <div class="main-container">
        <div class="checkout">
            <h1>Checkout</h1>
            <form method="post" class="form-container" id="myForm">
                @csrf

                <input type="hidden" name="movieid" value="{{ $movie->id }}">
                <input type="hidden" name="username" value="{{ Auth::user()->name }}">
                <input type="text" name="fname" id="fname" class="text-form" placeholder="First Name" required>
                <input type="text" name="lname" id="lname" class="text-form" placeholder="Last Name" required>
                <label for="seats">Seat: </label>
                <select name="seat" id="seats">
                    <option value=""></option>
                        @for($i=1;$i<=50;$i++)
                            @if(!in_array($i, $seat))
                                <option value="{{$i}}">{{$i}}</option>
                            @endif
                        @endfor
                    {{-- @for($i=1;$i<=50;$i++)
                        @if(!in_array($i, $ticket->seat))
                            <option value="{{$i}}">{{$i}}</option>
                        @endif
                    @endfor --}}
                </select>
                <div class="buttons">
                    <input type="submit" id="{{ $movie->id }}" class="btn" name="purchase" value="Purchase">
                    <a href="{{ url('/') }}" class="btn-cancel">Cancel</a>
                </div>
            </form>
            <p class="amount">Price: ${{ $movie->price }}</p>
        </div>
        <div class="movie-info">
            <img src="{{ asset('image/'.$movie->image) }}" alt="" height="200" width="133">
            <p class="title">{{ $movie->title }}</p>
            <p class="desc">{{ $movie->description }}</p>
        </div>  
    </div>

    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('form').on('submit', function(e){
                e.preventDefault();

                $.ajax({
                    url: '{{ url('ticketpurchase') }}',
                    type: 'post',
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(data){
                        $.notify('Success!', {position:"bottom right",className:"success"});
                        setTimeout(function() { 
                                window.location = "{{ url('userhistory') }}"; 
                            }, 2000);
                    }
                });
            })
        });
    </script>
@endsection