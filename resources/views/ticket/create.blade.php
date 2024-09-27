@extends('layouts.app')

@section('content')

<div class="container">
    <div class="box-header with-border">
        <h3 class="box-title">Create Ticket</h3><br/>
    </div> 
    <div class="row justify-content-center"> 
        <div class="col-md-12">
            <div class="card p-3">
                <div class="card-body">
                    <form action="{{ route('tickets.store') }}" method="POST">
                        @csrf 
                        <div class="form-group row">
                            <label for="subject" class="col-sm-2 col-form-label">Subject</label>
                            <div class="col-sm-10">
                                <input type="text" name="subject" class="form-control" id="inputEmail3" placeholder="Subject" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="message" class="col-sm-2 col-form-label">Message</label>
                            <div class="col-sm-10">
                            <textarea name="message" rows="4" cols="50" id="message" class="form-control" placeholder="Message"></textarea>
                            </div>
                        </div> 
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="submit" name="form" class="btn btn-primary pull-right">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection