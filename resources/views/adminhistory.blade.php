<title>History | MHS</title>
<link href="{{ asset('/css/adminhistory.css') }}" rel="stylesheet">
@extends('master')

@section('content')
    <div class="container">
        <div class="history-table">
            <div class="counter">
                <span>Total tickets: </span>
                <span id="target"></span>
            </div>
            <table id="tbl">
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

    {{-- Script for Table --}}
    <script>
        /**
         * Sorts the HTML table
         * 
         * @param {HTMLTableElement} table  | The table to sort
         * @param {number} column           | Index of column to sort
         * @param {boolean} asc             | Determines if sorting will be in ascending or descending order
         * 
         */
        // function sortTableByColumn(table, column, asc = true){
        //     const  
        // }
        
        // Get total number of tickets
        var table = document.getElementById("tbl");
        var rowCount = table.tBodies[0].rows.length;
        $("#target").text(rowCount);

        // Total of tickets sold
        var sumVal = 0;
        for(var i=1;i<table.rows.length;i++){
            sumVal = sumVal + parseFloat(table.rows[i].cells[6].innerHTML);
        }
        console.log(sumVal);
        $("#totalprice").text('$' + sumVal);
    </script>
@endsection