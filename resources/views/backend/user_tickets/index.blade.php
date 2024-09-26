@extends('backend.layouts.app')

@section('title')
<title>{{ env('APP_NAME') }} - {{ ucwords(Request::segment(1) .' '. Request::segment(2)) }}</title>
@endsection

@section('content')

@php
$statusArr = [0=>"Open", 1=>"Close"];
$statusClassArr = [0=>"success", 1=>"danger"];
@endphp 
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Customer Tickets</h3>
                    <a href="{{ route('users.create') }}" class="btn btn-primary pull-right" style="margin-right: 5px;"> Add New</a>
                </div>
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-striped">
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
                            <tr class="client__manage_{{ $row->id }}">
                                <td>{{ $row->id }}</td>
                                <td><img class="rounded-circle lazy" data-src="{{ asset($row->user?->avatar)}}"  src="{{ asset('assets/img/placeholder/avatar.jpg') }}" onerror="this.onerror=null;this.src='{{ asset('assets/img/placeholder/avatar.jpg') }};" style="width:50px"></td>
                                <td>{{ $row->user->name }}</td>
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
                        <tfoot>
                            <th>T.ID</th>
                            <th>Avatar</th>
                            <th>Customer Name</th> 
                            <th>Suject</th> 
                            <th>Created Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script> 
    function tClose(id){ 
        swal.fire({
            title: "Are you sure?",
            text: "You will not be able to close this titket!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Yes, I am sure!',
            cancelButtonText: "No, cancel it!"
        }).then(result => { 
            if (result.value) {
                $.ajax({
                    type: "GET",
                    url: main_url + "/admin/userticket/close",
                    data: {
                        id:id
                    },
                    success: function(data) {
                        if(data.val == 1){
                            swal.fire("Success", "Ticket has been close successfully", "success");
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        }
                        else{
                            swal.fire('Somethign went wrong', 'Thanks'+ ":)", "error"); 
                        } 
                    }
                });
                
            } else if (
                result.dismiss === swal.DismissReason.cancel
            ) {
                swal.fire('Cancelled', 'Safe'+ ":)", "error");
            }
        });
    }

    function tClosed(){
        swal.fire('This ticket already closed', 'Thanks'+ ":)", "error"); 
    } 

</script>
@endsection