<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\TicketReply;
use Validator;
use Auth;
use Carbon\Carbon;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::where('user_id', Auth::user()->id)->orderBy("id", "DESC")->get();
        return view('ticket.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        return view('ticket.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'subject' => ['required', 'string', 'max:255'],
                'message' => ['required']
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $ticket = new Ticket();
            $ticket->user_id = Auth::user()->id;
            $ticket->subject = $request->subject;
            $ticket->message = $request->message; 
            if($ticket->save()){ 
                return redirect()->route('tickets.index')->with('success', 'Ticket has been created successfully.');
            }
        } 
        //catch exception
        catch(Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong!'); 
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ticket = Ticket::with('user','reply_ticket')->where('id', $id)->first();
        // dd($ticket);
        return view('ticket.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try { 

            $validator = Validator::make($request->all(),[ 
                'message' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            
            $ticket_reply = new TicketReply();
            $ticket_reply->ticket_id = $request->ticket_id; 
            $ticket_reply->user_id = Auth::user()->id;
            $ticket_reply->message = $request->message;
            // $ticket_reply->created_at = now();
            if($ticket_reply->save()){
                return redirect()->back()->with('success', 'Ticket has been reply successfully.'); 
            } 
        } 
        //catch exception
        catch(Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong!'); 
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
