<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(){
        $ticket = Ticket::all();
        return view('ticket', ['ticket'=>$ticket]);
    }

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
