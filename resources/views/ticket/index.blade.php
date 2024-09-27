@extends('layouts.app')

@section('content')


<div class="container">
     
    <div class="row justify-content-center"> 
        <div class="col-md-12">
            @if(count($tickets)>0)
            <div class="box-header with-border">
                <h3 class="box-title">Manage Tickets</h3><br/>
            </div>
            <div class="card">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">T.ID</th>
                            <th scope="col">Suject</th>
                            <th scope="col">Message</th>
                            <th scope="col">Created Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tickets as $row)
                        <tr>
                            <th>{{ $row->id }}</th>
                            <td>{{ Str::limit($row->subject, 50) }} @if($row->status ==1) <span class="badge badge-pill badge-danger">close</span> @else <span class="badge badge-pill badge-primary">open</span> @endif</td>
                            <td>{{ Str::limit($row->message, 50) }}</td>
                            <td>{{ $row->created_at->format('d-m-Y') }}</td>
                            <td>
                                <a href="{{ route('tickets.show', encrypt($row->id)) }}" class="btn btn-primary"> 
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                </svg> Show
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mr-4"> 
                    {{ $tickets->links("pagination::bootstrap-4") }}
                </div>
            </div>
            @else
                <div class="card">
                    <div class="card-body">
                    No Tickets Founds
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection