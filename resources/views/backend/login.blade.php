<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Log in</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('assets/backend/libs/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/libs/iCheck/square/blue.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/backend/libs/toastr/toastr.min.css') }}"> 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('admin.login') }}">LTD</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <form action="{{ route('admin.login.post') }}" method="POST">
                @csrf
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="email" placeholder="Email or Phone">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                        </div>
                    </div><!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div><!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center">
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td><a href="#">admin@gmail.com</a></td>
                                <td><a href="#">12345678</a></td> 
                                <td><small class="badge bg-red">super-admin</small></td> 
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <a href="#">I forgot my password</a><br>
        </div>
    </div>

    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('assets/backend/libs/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('assets/backend/libs/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/backend/libs/iCheck/icheck.min.js') }}"></script>
    <script src="{{ asset('assets/backend/libs/toastr/toastr.min.js') }}"></script>

    <script>

$(function() {
			@if (Session::has('message'))

				function Toast(type, css, msg) {
					this.type = type;
					this.css = css;
					this.msg = "{{ Session::get('message') }}";
				}

				var type = "{{ Session::get('alert-type') }}"
				switch (type) { 
					case 'success':
						var toasts = [ 
							new Toast('success', 'toast-bottom-left', 'bottom right'),
						];
						delayToasts();
						break;
					case 'warning':
						var toasts = [ 
							new Toast('warning', 'toast-bottom-left', 'bottom right'),
						];
						delayToasts();
						break;
					case 'error':
						var toasts = [ 
							new Toast('error', 'toast-bottom-left', 'bottom right'),
						];
						delayToasts();
						break;
				}

				toastr.options.positionClass = 'toast-top-full-width';
				toastr.options.extendedTimeOut = 1000; //1000;
				toastr.options.timeOut = 2000;
				toastr.options.fadeOut = 2500;
				toastr.options.fadeIn = 2500;

				var i = 0;

				function delayToasts() {
					if (i === toasts.length) { return; }
					var delay = i === 0 ? 0 : 2100;
					window.setTimeout(function () { showToast(); }, delay);

					// re-enable the button        
					if (i === toasts.length-1) {
						window.setTimeout(function () {
							// $('#tryMe').prop('disabled', false);
							i = 0;
						}, delay + 2000);
					}
				}

				function showToast() {
					var t = toasts[i];
					toastr.options.positionClass = t.css;
					toastr[t.type](t.msg);
					i++;
					delayToasts();
				}
			@endif
	    });

        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            var info = $('table tbody tr');
            info.click(function() {
                var email    = $(this).children().first().text(); 
                var password = $(this).children().first().next().text();
                $("input[name=email]").val(email);
                $("input[name=password]").val(password);
            });
            $(".close").on('click',function(){
                $(".alert-success").hide();
                $(".alert-warning").hide();
            });
        });
    </script>

    

</body>

</html>
