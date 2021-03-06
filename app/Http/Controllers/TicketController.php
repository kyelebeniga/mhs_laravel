<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function index(){
        $ticket = Ticket::all();
        return view('ticket', ['ticket'=>$ticket]);
    }

    public function history(){
        $user = Auth::user()->name;
        $tickets = Ticket::join('movie', 'movie.id', '=', 'tickets.movieid')
                    ->where('tickets.username', '=', $user)
                    ->get();

        // $tickets = $user->with(['tickets' => function($query)use($movie_id){
        //     $query->where('movieid', $movie_id);
        // }]);


        return view('userhistory', compact(['tickets']));
    }

    public function adminhistory(){
        $tickets = Ticket::join('movie', 'movie.id', '=', 'tickets.movieid')
                    ->select(['tickets.id AS ticketid', 'tickets.*', 'movie.title', 'movie.price'])
                    ->get();

        return view('adminhistory', compact(['tickets']));
    }

    //Function to buy the ticket
    public function store(Request $request){
        Ticket::create([
            'movieid' => $request->movieid,
            'username' => $request->username,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'seat' => $request->seat,
        ]);
    }
}
