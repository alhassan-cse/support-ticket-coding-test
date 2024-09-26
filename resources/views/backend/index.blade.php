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
                <span class="info-box-icon bg-aqua"></span>
                <div class="info-box-content">
                    <span class="info-box-text">Products</span>
                    <span class="info-box-number">00</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"></span>
                <div class="info-box-content">
                    <span class="info-box-text">Orders </span>
                    <span class="info-box-number">00</span>
                </div>
            </div>
        </div>
        
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"></span>
                <div class="info-box-content">
                    <span class="info-box-text">New Customers</span>
                    <span class="info-box-number">00</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"></span>
                <div class="info-box-content">
                    <span class="info-box-text">All Customers</span>
                    <span class="info-box-number">00</span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Latest Orders</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                @php
                $orderStatusArr = [0=>"Pending", 1=>"Processing", 2=>"Shipped", 3=>"Delivered"];
                @endphp
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Item</th>
                                    <th>Status</th>
                                    <th>Popularity</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                    <td>Call of Duty IV</td>
                                    <td><span class="label label-success">Shipped</span></td>
                                    <td>
                                        <div class="sparkbar" data-color="#00a65a" data-height="20">
                                            90,80,90,-70,61,-83,63</div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <a href="#" class="btn btn-social-icon btn-bitbucket"><i class="fa fa-eye"></i></a>
                                            <a href="#" class="btn btn-social-icon btn-bitbucket"><i class="fa fa-edit"></i></a>
                                            <a onclick="#" class="btn btn-social-icon btn-dropbox"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box-footer clearfix">
                    <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">Place New
                        Order</a>
                    <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">View All
                    Orders</a>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            @php 
            $statusArr = [0=>"Inactive", 1=>"Active"];
            $statusClassArr = [0=>"danger", 1=>"success"];
            @endphp 
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Latest Products</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                 <!-- product table -->
                <div class="box-footer clearfix">
                    <a href="#" class="btn btn-sm btn-info btn-flat pull-left">Add Product</a>
                    <a href="#" class="btn btn-sm btn-default btn-flat pull-right">View All Products</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection