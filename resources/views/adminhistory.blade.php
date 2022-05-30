<title>History | MHS</title>
<link href="{{ asset('/css/adminhistory.css') }}" rel="stylesheet">
@extends('master')

@section('content')
    <div class="container">
        <div class="history-table">
            <div class="counter">
                <span>Tickets sold: </span>
                <span id="target"></span>
            </div>
            <table id="tbl" class="table table-sortable">
                <thead>
                    <tr>
                        <th style="width:10%">Ticket ID</th>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Movie</th>
                        <th>Seat</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tickets as $ticket)
                        <tr>
                            <td>{{ $ticket->ticketid }}</td>
                            <td>{{ $ticket->username }}</td>
                            <td>{{ $ticket->fname }}</td>
                            <td>{{ $ticket->lname }}</td>
                            <td>{{ $ticket->title }}</td>
                            <td>{{ $ticket->seat }}</td>
                            <td>{{ $ticket->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="price">
                <p>Total:</p>
                <span id="totalprice"></span>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/table.js') }}"></script>
@endsection