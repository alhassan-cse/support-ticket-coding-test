@extends('backend.layouts.app')

@section('title')
<title>{{ env('APP_NAME') }} - {{ ucwords(Request::segment(2)) }}</title>
@endsection

@section('content')

@php
$UserTypeArr = [0=>"Empty", 1=>"Admin", 2=>"Customer"];
$statusArr = [0=>"Inactive", 1=>"Active"];
$statusClassArr = [0=>"danger", 1=>"success"];
@endphp 
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Users</h3>
                    <a href="{{ route('users.create') }}" class="btn btn-primary pull-right" style="margin-right: 5px;"> Add New</a>
                </div>
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Avatar</th>
                                <th>User Type</th> 
                                <th>Name</th> 
                                <th>Phone</th> 
                                <th width="400px">Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key=>$row)
                            <tr class="client__manage_{{ $row->id }}">
                                <td>{{ ++$key }}</td>
                                <td><img class="rounded-circle lazy" data-src="{{ asset($row->avatar)}}"  src="{{ asset('assets/img/placeholder/avatar.jpg') }}" onerror="this.onerror=null;this.src='{{ asset('assets/img/placeholder/avatar.jpg') }};" style="width:50px"></td>
                                <td>{{ $UserTypeArr[$row->user_type] }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->phone }}</td>
                                <td>{{ $row->email }}</td>
                                <td>
                                    <span class="label label-{{ $statusClassArr[$row->status] }}">{{ $statusArr[$row->status] }}</span>
                                </td>
                                <td>
                                    <div class="text-center">
                                        @if($row->status == 1)
                                        <a href="{{ route('user.inactive', encrypt($row->id)) }}" class="btn btn-social-icon btn-bitbucket"><i class="fa fa-thumbs-o-down"></i></a>
                                        @else
                                        <a href="{{ route('user.active', encrypt($row->id)) }}" class="btn btn-social-icon btn-bitbucket"><i class="fa fa-thumbs-o-up"></i></a>
                                        @endif
                                        <a href="{{ route('users.edit', encrypt($row->id)) }}" class="btn btn-social-icon btn-bitbucket"><i class="fa fa-edit"></i></a>
                                        <a onclick="dtrash({{ $row->id }});" class="btn btn-social-icon btn-dropbox"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <th>SL</th>
                            <th>Avatar</th>
                            <th>User Type</th> 
                            <th>Name</th> 
                            <th>Phone</th> 
                            <th width="400px">Email</th>
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
    function dtrash(id){
        swal.fire({
            title: "Are you sure?",
            text: "You will not be able to recover this user!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#DD6B55',
            confirmButtonText: 'Yes, I am sure!',
            cancelButtonText: "No, cancel it!"
        }).then(result => { 
            if (result.value) {
                $.ajax({
                    type: "GET",
                    url: main_url + "/admin/remove/user",
                    data: {
                        id:id
                    },
                    success: function(data) {
                       classname = 'client__manage_'+id;
                       $('.'+classname).hide('slow');
                    }
                });
                swal.fire("Success", "Delete Successfully", "success");
            } else if (
                 
                result.dismiss === swal.DismissReason.cancel
            ) {
                swal.fire('Cancelled', 'Safe'+ ":)", "error");
            }
        });
    }
</script>
@endsection