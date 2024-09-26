@extends('backend.layouts.app')

@section('title')
<title>{{ env('APP_NAME') }} - {{ ucwords(Request::segment(1) .' '. Request::segment(2)) }}</title>
@endsection

@section('content')
 
<style>

.direct-chat-messages {
    -webkit-transform: translate(0, 0);
    transform: translate(0, 0);
    height: 400px;
    overflow: auto;
    padding: 10px;
}

.direct-chat-msg {
    margin-bottom: 10px;
}

.direct-chat-infos {
    display: block;
    font-size: .875rem;
    margin-bottom: 2px;
}

direct-chat-name {
    font-weight: 600;
}
.float-left {
    float: left !important;
}

.direct-chat-timestamp {
    color: #697582;
}
.float-right {
    float: right !important;
}

.clearfix::after {
    display: block;
    clear: both;
    content: "";
}

.direct-chat-infos {
    display: block;
    font-size: .875rem;
    margin-bottom: 2px;
}

.direct-chat-img {
    border-radius: 50%;
    float: left;
    height: 40px;
    width: 40px;
}

.direct-chat-text {
    border-radius: .3rem;
    background-color: #d2d6de;
    border: 1px solid #d2d6de;
    color: #444;
    margin: 5px 0 0 50px;
    padding: 5px 10px;
    position: relative;
}

.direct-chat-msg, .direct-chat-text {
    display: block;
}

.direct-chat-text::before {
    border-width: 6px;
    margin-top: -6px;
}

.direct-chat-text::after, .direct-chat-text::before {
    border: solid transparent;
    border-right-color: #d2d6de;
    content: " ";
    height: 0;
    pointer-events: none;
    position: absolute;
    right: 100%;
    top: 15px;
    width: 0;
}

.direct-chat-text::after {
    border-width: 5px;
    margin-top: -5px;
}

.direct-chat-text::after, .direct-chat-text::before {
    border: solid transparent;
    border-right-color: #d2d6de;
    content: " ";
    height: 0;
    pointer-events: none;
    position: absolute;
    right: 100%;
    top: 15px;
    width: 0;
}

.direct-chat-msg::after {
    display: block;
    clear: both;
    content: "";
}

.direct-chat-msg {
    margin-bottom: 10px;
}
.direct-chat-msg, .direct-chat-text {
    display: block;
}

/* .direct-chat-infos {
    display: block;
    font-size: .875rem;
    margin-bottom: 2px;
} */
.card-footer {
    padding: 3.75rem 1.25rem;
    background-color: rgba(0, 0, 0, .03);
    border-top: 0 solid rgba(0, 0, 0, .125);
}
.input-group {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -ms-flex-align: stretch;
    align-items: stretch;
    width: 100%;
}
.input-group-append {
    margin-left: -1px;
}
.input-group-append, .input-group-prepend {
    display: -ms-flexbox;
    display: flex;
}
.btn:not(:disabled):not(.disabled) {
    cursor: pointer;
}
.input-group-append .btn, .input-group-prepend .btn {
    position: relative;
    z-index: 2;
}
</style>


<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box"> 
                <div class="box-header with-border">
                    <h3 class="box-title">Customer Ticket Reply</h3>
                </div>
                <div class="box-body"> 
                    <div class="card direct-chat direct-chat-primary" style="position: relative; left: 0px; top: 0px;"> 
                        <div class="card-body"> 
                            <div class="direct-chat-messages"> 
                                <div class="direct-chat-msg">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-left">{{ $ticket->user?->name }}</span>
                                        <span class="direct-chat-timestamp float-right">{{ $ticket->created_at->format('d-m-Y') }}</span>
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
                                        <span class="direct-chat-timestamp float-left">{{ date('j M Y H:i:s A', strtotime($ticket->created_at)) }} ({{ \Carbon\Carbon::parse($ticket->created_at)->diffForHumans() }})</span>
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
                                        <span class="direct-chat-timestamp float-right">{{ date('j M Y H:i:s A', strtotime($ticket->created_at)) }} ({{ \Carbon\Carbon::parse($ticket->created_at)->diffForHumans() }})</span>
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
                                    <textarea type="text" name="message" class="form-control" placeholder="Reply" required"></textarea>
                                </div>
                                <input type="" name="ticket_id" value="{{ $ticket->id }}">
                                <input type="" name="user_id" value="{{ $ticket->user_id}}">
                                <div class="form-group"> 
                                   <button type="submit" class="btn btn-info pull-right">Send</button>
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