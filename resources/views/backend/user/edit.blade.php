@extends('backend.layouts.app')

@section('title')
<title>{{ env('APP_NAME') }} - {{ ucwords(Request::segment(2)) }}</title>
@endsection

@section('content') 
<section class="content">
    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add User</h3>
                    </div>  
                    <div class="box-body"> 
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>User Type</label>
                                    <select class="form-control select2 @error('user_type') is-invalid @enderror" name="user_type" required style="width: 100%;"/>
                                        <option value="">Select User Type</option>
                                        <option @if($user->user_type == 1) selected @endif value="1">Admin</option> 
                                        <option @if($user->user_type == 2) selected @endif value="2">Customer</option>
                                    </select>
                                    @error('user_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_type') }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" required value="{{ $user->name }}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required value="{{  $user->email }}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone" required value="{{ $user->phone }}">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @enderror
                                </div> 

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div> 

                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">
                                </div> 
   
                                <div class="form-group avatar-option">
                                    <label>Avatar</label>
                                    <input type="file" name="avatar" class="form-control">
                                    <img class="rounded-circle lazy" data-src="{{ asset($user->avatar)}}"  src="{{ asset('assets/img/placeholder/avatar.jpg') }}" onerror="this.onerror=null;this.src='{{ asset('assets/img/placeholder/avatar.jpg') }};" style="width:50px">
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control select2" name="status" style="width: 100%;">
                                        <option value="0">Select Status</option>
                                        <option @if($user->status == 1) selected @endif value="1">Active</option> 
                                        <option @if($user->status == 0) selected @endif value="0">InActive</option>
                                    </select>
                                </div>
                            </div>
                        </div>  
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Save</button>
                    </div>
                </div>
            </div>
             
        </form>
    </div>
</section>
@endsection