<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $total_tickets = Ticket::count(); 
        $open_tickets = Ticket::where('status', 0)->count(); 
        $close_tickets = Ticket::where('status', 1)->count();
        $total_users = User::where('user_type', 2)->count(); 
        $tickets = Ticket::with('user')->orderBy("id", "DESC")->take(10)->get(); 
        return view('backend.index', compact('total_tickets', 'open_tickets', 'close_tickets', 'total_users', 'tickets'));
    }
}
