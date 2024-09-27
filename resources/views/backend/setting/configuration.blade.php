@extends('backend.layouts.app')

@section('title')
<title>{{ env('APP_NAME') }} - {{ ucwords(Request::segment(1) .' '. Request::segment(2)) }}</title>
@endsection

@section('content')
 
<style>
    .form-control.is-invalid, .was-validated .form-control:invalid {
        border-color: #dc3545;
        padding-right: calc(1.5em + .75rem) !important;
        background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='none' stroke='%23dc3545' viewBox='0 0 12 12'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e);
        background-repeat: no-repeat;
        background-position: right calc(.375em + .1875rem) center;
        background-size: calc(.75em + .375rem) calc(.75em + .375rem);
    }
    .invalid-feedback {
        width: 100%;
        margin-top: .25rem;
        font-size: .875em;
        color: #dc3545;
    }
</style>

<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">App Setting</h3>
                </div> 
                <form action="{{ route('app.update') }}" method="POST">
                    @csrf 
                    <div class="box-body"> 
                        <div class="row">
                            <div class="col-md-12"> 
                                <div class="form-group">
                                    <input type="hidden" name="types[]" value="APP_NAME">
                                    <label>App Name</label>
                                    <input type="text" name="APP_NAME" class="form-control" placeholder="App Name" required value="{{ env('APP_NAME') }}">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="types[]" value="APP_URL">
                                    <label>App Url</label>
                                    <input type="text" name="APP_URL" class="form-control" placeholder="App Name" required value="{{ env('APP_URL') }}">
                                </div>
                            </div>
                        </div>  
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Save</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-6">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">SMTP </h3>
                </div> 
                <form action="{{ route('smtp.update') }}" method="POST">
                    @csrf 
                    <div class="box-body"> 
                        <div class="row">
                            <div class="col-md-12"> 
                                <div class="form-group">
                                    <input type="hidden" name="types[]" value="MAIL_MAILER">
                                    <label>Mail Mailer</label>
                                    <input type="text" name="MAIL_MAILER" class="form-control" placeholder="Mail Mailer" required value="{{ env('MAIL_MAILER') }}">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="types[]" value="MAIL_HOST">
                                    <label>Mail Host</label>
                                    <input type="text" name="MAIL_HOST" class="form-control" placeholder="Mail Host" required value="{{ env('MAIL_HOST') }}">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="types[]" value="MAIL_PORT">
                                    <label>Mail Port</label>
                                    <input type="text" name="MAIL_PORT" class="form-control" placeholder="Mail Port" required value="{{ env('MAIL_PORT') }}">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="types[]" value="MAIL_USERNAME">
                                    <label>Mail Username</label>
                                    <input type="text" name="MAIL_USERNAME" class="form-control" placeholder="Mail Username" required value="{{ env('MAIL_USERNAME') }}">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="types[]" value="MAIL_PASSWORD">
                                    <label>Mail Password</label>
                                    <input type="text" name="MAIL_PASSWORD" class="form-control" placeholder="Mail Password" required value="{{ env('MAIL_PASSWORD') }}">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="types[]" value="MAIL_ENCRYPTION">
                                    <label>Mail Encryption</label>
                                    <input type="text" name="MAIL_ENCRYPTION" class="form-control" placeholder="Mail Encryption" required value="{{ env('MAIL_ENCRYPTION') }}">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="types[]" value="MAIL_FROM_ADDRESS">
                                    <label>Mail From Address</label>
                                    <input type="text" name="MAIL_FROM_ADDRESS" class="form-control" placeholder="Mail From Address" required value="{{ env('MAIL_FROM_ADDRESS') }}">
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection