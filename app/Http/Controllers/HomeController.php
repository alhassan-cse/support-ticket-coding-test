<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::check()){
            $tickets = Ticket::where('user_id', Auth::user()->id)->orderBy("id", "DESC")->paginate(10); 
            return view('ticket.index', compact('tickets'));
        } 
        return view('home');
    }
    
}
