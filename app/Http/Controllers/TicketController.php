<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Movie;

class TicketController extends Controller
{
    public function index(){
        $ticket = Ticket::all();
        return view('ticket', ['ticket'=>$ticket]);
    }

    public function history(){
        $user = Auth::user()->name;
        $history = Ticket::where('name', '=', $user)->all();
        $movie = Movie::all();

        return view('userhistory', compact(['history, movie']));
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
