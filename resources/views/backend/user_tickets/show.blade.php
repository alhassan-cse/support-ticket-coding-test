@extends('backend.layouts.app')

@section('title')
<title>{{ env('APP_NAME') }} - {{ ucwords(Request::segment(1) .' '. Request::segment(2)) }}</title>
@endsection

@section('content')
 
<style>
 
</style>


<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box"> 
                <div class="box-header with-border">
                    <h3 class="box-title">Customer Ticket Reply</h3><br/>
                    <b class="box-title">Subject: {{ $ticket->subject }} @if($ticket->status ==1) <span class="badge badge-pill badge-danger">close</span> @else <span class="badge badge-pill badge-primary">open</span> @endif</b>
                </div>
                <div class="box-body"> 
                    <div class="card direct-chat direct-chat-primary" style="position: relative; left: 0px; top: 0px;"> 
                        <div class="card-body"> 
                            <div class="direct-chat-messages"> 
                                <div class="direct-chat-msg">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-left">Customer: {{ $ticket->user?->name }}</span>
                                        <span class="direct-chat-timestamp float-right">{{ date('j M Y H:i:s A', strtotime($ticket->created_at)) }} ({{ \Carbon\Carbon::parse($ticket->created_at)->diffForHumans() }})</span>
                                    </div> 
                                    <img class="direct-chat-img lazy" alt="{{ $ticket->user?->name }}" data-src="{{ $ticket->user?->avatar }}" src="{{ asset('assets/img/placeholder/avatar.jpg') }}" onerror="this.onerror=null;this.src='{{ asset('assets/img/placeholder/avatar.jpg') }};">
                                    <div class="direct-chat-text">
                                    {{ $ticket->message }}
                                    </div> 
                                </div> 
                                @foreach($ticket->reply_ticket as $reply_ticket) 
                                <!-- Message to the right -->
                                @if($reply_ticket->user_id == null)
                                <div class="direct-chat-msg right">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-right">Admin: {{ $reply_ticket->user_reply?->name }}</span>
                                        <span class="direct-chat-timestamp float-left">{{ date('j M Y H:i:s A', strtotime($reply_ticket->created_at)) }} ({{ \Carbon\Carbon::parse($reply_ticket->created_at)->diffForHumans() }})</span>
                                    </div>
                                    <img class="direct-chat-img lazy" alt="{{ Auth::user()->name }}" data-src="{{ Auth::user()->avatar }}" src="{{ asset('assets/img/placeholder/avatar.jpg') }}" onerror="this.onerror=null;this.src='{{ asset('assets/img/placeholder/avatar.jpg') }};">
                                    <div class="direct-chat-text">
                                     {{ $reply_ticket->message }}
                                    </div> 
                                </div>
                                <!-- /.direct-chat-msg -->
                                 @else
                                <!-- Message. Default to the left -->
                                <div class="direct-chat-msg">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-left">Customer: {{ $reply_ticket->user?->name }}</span>
                                        <span class="direct-chat-timestamp float-right">{{ date('j M Y H:i:s A', strtotime($reply_ticket->created_at)) }} ({{ \Carbon\Carbon::parse($reply_ticket->created_at)->diffForHumans() }})</span>
                                    </div>
                                    <img class="direct-chat-img lazy" alt="{{ Auth::user()->name }}" data-src="{{ Auth::user()->avatar }}" src="{{ asset('assets/img/placeholder/avatar.jpg') }}" onerror="this.onerror=null;this.src='{{ asset('assets/img/placeholder/avatar.jpg') }};">
                                    <div class="direct-chat-text">
                                       {{ $reply_ticket->message }}
                                    </div> 
                                </div>
                                @endif
                                <!-- /.direct-chat-msg -->
                                @endforeach 

                            </div> 
                        <!-- /.direct-chat-pane -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <form action="{{ route('usertickets.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <textarea type="text" name="message" rows="4" cols="50" class="form-control" placeholder="Reply" required"></textarea>
                                </div>
                                <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                                <input type="hidden" name="user_id" value="{{ $ticket->user_id}}">
                                <div class="form-group"> 
                                    @if($ticket->status ==1)
                                       <a href="#" class="btn btn-danger pull-right disabled">Close</a>
                                    @else
                                       <button type="submit" class="btn btn-info pull-right">Send</button>
                                    @endif 
                                </div> 
                            </form> 
                        </div> 
                    </div>
                </div> 
            </div>
        </div>
    </div>
</section>
@endsection