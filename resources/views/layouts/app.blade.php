<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Customer - Ticket Request</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="{{ asset('assets/backend/css/AdminLTE.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    </head>
    <style>
        .pt-option{
            margin-bottom: 220px;
        }
        .pt-option-no-more{
            margin-bottom: 400px;
        }
        
    </style>
<body>

    <div class="container"> 
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ url('/') }}">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                
            <div class="collapse navbar-collapse d-flex flex-row-reverse" id="navbarSupportedContent">
                <div class="d-flex flex-row-reverse">

                    @guest
                        @if (Route::has('login'))
                           <a class="btn btn-outline-success my-2 my-sm-0" href="{{ route('login') }}">Login</a>
                        @endif

                        @if (Route::has('register')) 
                            <a class="btn btn-outline-success my-2 my-sm-0 m-2" href="{{ route('register') }}">Register</a>
                        @endif
                    @else
                        <a class="btn btn-outline-success my-2 my-sm-0 m-2" href="javascript:void(0)">{{ Auth::user()->name }}</a>
                        <a class="btn btn-outline-success my-2 my-sm-0" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endguest

                </div>
            </div>
        </nav>
    </div>
   
    <div class="container pt-3">
       
        <div class="row justify-content-center mb-4"> 
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Ticket') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @guest
                        {{ __('Please login!') }}
                        @else 
                        {{ __('You are logged in!') }}
                        @endguest

                        @if (Auth::check() && Auth::user()->user_type == 2)
                        <div class="d-flex flex-row-reverse bd-highlight">
                            <a class="btn btn-primary ml-3" href="{{ route('tickets.index') }}" role="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                                </svg> Manage Ticket
                            </a>
                            <a class="btn btn-primary" href="{{ route('tickets.create') }}" role="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
                                </svg> Create Ticket
                            </a> 
                        </div>
                        @endif
 
                    </div>
                </div>
            </div>
        </div>
        
        @yield('content')
    </div>

    <footer class="bg-dark" style="margin-top:300px">
        <div class="d-md-flex justify-content-between align-items-center text-center text-lg-start py-4">
			<!-- copyright text -->
			<div class="text-white"> Copyrights ©2024 BID Requests</div>
        </div>
    </footer>
</body>
</html>
