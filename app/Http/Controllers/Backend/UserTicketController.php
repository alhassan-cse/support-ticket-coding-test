<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\TicketReply;
use Mail;
use Validator;
use Auth;

class UserTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::with('user')->orderBy("id", "DESC")->get();
        return view('backend.user_tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[ 
                'message' => 'required',
                'ticket_id' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $ticket_reply = new TicketReply();
            $ticket_reply->ticket_id = $request->ticket_id; 
            $ticket_reply->reply_id = Auth::user()->id;
            $ticket_reply->message = $request->message;
            if($ticket_reply->save()){
                $notification = array(
                    'message' => 'Ticket has been reply successfully',
                    'alert-type' => 'success'
                ); 
                return redirect()->back()->with($notification);
            }
        } 
        //catch exception
        catch(Exception $e) {
            $notification = array(
                'message' => 'Something went wrong',
                'alert-type' => 'error'
            ); 
            return redirect()->back()->with($notification);
        }
    }
 

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ticket = Ticket::with('user','reply_ticket')->where('id', $id)->first();
        
        if($ticket->notification == 0){
            $ticket_id  = $ticket->id;
            $name  = $ticket->user->name;
            $email = $ticket->user->email; 
            $send = Mail::send('email.notification', ['name'=>$name, 'email'=>$email, 'ticket_id'=>$ticket_id], function($message) use($email){
                // $sysEmail = "events.meca@gmail.com";
                $sysEmail = "devcustomer007@gmail.com";
                $sysCompany = env('APP_NAME');
                $mail_subject = "Ticket Notification";
                $message->from($sysEmail, $sysCompany);
                $message->to($email);
                $message->subject($mail_subject); 
            });
            if($send){
                $ticket->notification = 1;
                $ticket->save(); 
            }
        } 
        return view('backend.user_tickets.show', compact('ticket'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function userticketClose(Request $request)
    {
        try { 
            $ticket_update = Ticket::where('id', $request->id)->update(['status'=>1]);
            $ticket = Ticket::with('user','reply_ticket')->where('id', $request->id)->first();
            $ticket_id  = $ticket->id;
            $name  = $ticket->user->name;
            $email = $ticket->user->email;
            Mail::send('email.close', ['name'=>$name, 'email'=>$email, 'ticket_id'=>$ticket_id], function($message) use($email){
                // $sysEmail = "events.meca@gmail.com";
                $sysEmail = "devcustomer007@gmail.com";
                $sysCompany = env('APP_NAME');
                $mail_subject = "Ticket Notification";
                $message->from($sysEmail, $sysCompany);
                $message->to($email);
                $message->subject($mail_subject); 
            }); 
            return response()->json([
                'val' => 1
            ]);
        } 
        //catch exception
        catch(Exception $e) {
            return response()->json([
                'val' => 0
            ]);
        } 
    }

    

}
