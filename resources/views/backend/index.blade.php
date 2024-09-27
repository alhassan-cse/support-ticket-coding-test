@extends('backend.layouts.app')

@section('title')
<title>{{ env('APP_NAME') }} - {{ ucwords(Request::segment(2)) }}</title>
@endsection

@section('content')

<section class="content-header">
    <h1>{{ ucwords(Request::segment(2)) }}</h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    </ol>
</section>


<section class="content">
    <div class="row">

       <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"></span>
                <div class="info-box-content">
                    <span class="info-box-text">Total Tickets</span>
                    <span class="info-box-number">{{ $total_tickets }}</span>
                </div>
            </div>
        </div>


        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"></span>
                <div class="info-box-content">
                    <span class="info-box-text">Open Tickets</span>
                    <span class="info-box-number">{{ $open_tickets }}</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"></span>
                <div class="info-box-content">
                    <span class="info-box-text">Close Tickets </span>
                    <span class="info-box-number">{{ $close_tickets }}</span>
                </div>
            </div>
        </div>
        
        <div class="clearfix visible-sm-block"></div>

        
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"></span>
                <div class="info-box-content">
                    <span class="info-box-text">All Customers</span>
                    <span class="info-box-number">{{ $total_users }}</span>
                </div>
            </div>
        </div>
    </div>
    @php
    $statusArr = [0=>"Open", 1=>"Close"];
    $statusClassArr = [0=>"success", 1=>"danger"];
    @endphp 
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Last 10 Tickets</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>T.ID</th>
                                    <th>Avatar</th>
                                    <th>Customer Name</th> 
                                    <th>Suject</th> 
                                    <th>Created Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tickets as $row)
                                <tr>
                                    <td><a href="">{{ $row->id }}</a></td>
                                    <td><img class="rounded-circle lazy" data-src="{{ asset($row->user?->avatar)}}"  src="{{ asset('assets/img/placeholder/avatar.jpg') }}" onerror="this.onerror=null;this.src='{{ asset('assets/img/placeholder/avatar.jpg') }};" style="width:50px"></td>
                                    <td>{{ $row->user?->name }}</td>
                                    <td>{{ Str::limit($row->subject, 80) }}</td>
                                    <td>{{ $row->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        <span class="label label-{{ $statusClassArr[$row->status] }}">{{ $statusArr[$row->status] }}</span>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <a href="{{ route('usertickets.show', $row->id) }}" class="btn btn-social-icon btn-bitbucket"><i class="fa fa-reply"></i></a> 
                                            @if($row->status == 1)
                                            <a href="javascript:void(0)" onclick="tClosed();" class="btn btn-social-icon btn-bitbucket"><i class="fa fa-close"></i></a>
                                            
                                            @else
                                            <a href="javascript:void(0)" onclick="tClose({{ $row->id }});" class="btn btn-social-icon btn-bitbucket"><i class="fa fa-check"></i></a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>
        </div> 
    </div>
</section>
@endsection