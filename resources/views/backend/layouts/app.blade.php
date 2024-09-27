<!DOCTYPE html>
<html> 
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	@yield('title')
	 
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.svg"/>

	<link rel="stylesheet" href="{{ asset('assets/backend/libs/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/backend/libs/font-awesome/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/backend/libs/daterangepicker/daterangepicker-bs3.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/backend/libs/iCheck/all.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/backend/libs/colorpicker/bootstrap-colorpicker.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/backend/libs/timepicker/bootstrap-timepicker.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/backend/libs/select2/select2.min.css') }}"> 
	<link rel="stylesheet" href="{{ asset('assets/backend/libs/jvectormap/jquery-jvectormap-1.2.2.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/backend/css/AdminLTE.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/backend/css/AdminLTE.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/backend/css/skins/_all-skins.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/backend/libs/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/backend/libs/datatables/dataTables.bootstrap.css') }}"> 
	<link rel="stylesheet" href="{{ asset('assets/backend/libs/toastr/toastr.min.css') }}"> 
	<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
	<link href="{{ asset('assets/backend/libs/sweetalert2/sweetalert2.css') }}">

	@yield('style') 

</head>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<header class="main-header">
			<a href="{{ route('dashboard') }}" class="logo">
				<span class="logo-mini"><b>ALT</b></span>
				<span class="logo-lg">{{ env('APP_NAME') }}</span>
			</a>
			<nav class="navbar navbar-static-top" role="navigation">
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>

				{{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
					<path id="_754bac7463b8b1afad8e10a2355d1700" data-name="754bac7463b8b1afad8e10a2355d1700" d="M56,48a8,8,0,1,0,8,8A8,8,0,0,0,56,48Zm-.829,14.808a6.858,6.858,0,0,1-4.39-11.256,7.6,7.6,0,0,1,.077.93,2.966,2.966,0,0,0,.382,2.26,3.729,3.729,0,0,1,.362,1.08c.1.341.5.519.77.729.552.423,1.081.916,1.666,1.288.387.246.628.368.515.84a2.98,2.98,0,0,1-.313.951,1.927,1.927,0,0,0,.321.861c.288.288.575.553.889.813C55.938,61.706,55.4,62.229,55.171,62.808Zm5.678-1.959a6.808,6.808,0,0,1-3.56,1.888,2.844,2.844,0,0,1,.842-1.129,2.865,2.865,0,0,0,.757-.937,6.506,6.506,0,0,1,.522-.893c.272-.419-.67-1.051-.975-1.184a10.052,10.052,0,0,1-1.814-1.13c-.435-.306-1.318.16-1.808-.054A9.462,9.462,0,0,1,53,56.166c-.6-.454-.574-.984-.574-1.654.472.017,1.144-.131,1.458.249.1.12.439.655.667.465.186-.155-.138-.779-.2-.925-.193-.451.439-.626.762-.932.422-.4,1.326-1.024,1.254-1.309s-.9-1.1-1.394-.969c-.073.019-.719.7-.844.8q0-.332.01-.663c0-.14-.26-.283-.248-.373.031-.227.664-.64.821-.821-.11-.069-.487-.392-.6-.345-.276.115-.588.194-.863.309a1.756,1.756,0,0,0-.025-.274,6.792,6.792,0,0,1,1.743-.506l.542.218.382.454.382.394.334.108.53-.5L57,49.536v-.321a6.782,6.782,0,0,1,2.9,1.146c-.155.014-.326.037-.518.061a1.723,1.723,0,0,0-.268-.1c.251.54.513,1.073.779,1.606.284.569.915,1.18,1.026,1.781.131.708.04,1.352.111,2.185a3.732,3.732,0,0,0,.9,1.714,1.812,1.812,0,0,0,.707.086A6.815,6.815,0,0,1,60.849,60.849Z" transform="translate(-48 -48)" fill="#717580"></path>
				</svg> --}}

				<a href="{{ env('APP_URL') }}" class="sidebar-globe" target="_blank">
					<i class="fa fa-globe"></i>
				</a>
				
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav"> 
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img class="user-image lazy" alt="{{ Auth::user()->name }}" data-src="{{ Auth::user()->avatar }}" src="{{ asset('assets/img/placeholder/avatar.jpg') }}" onerror="this.onerror=null;this.src='{{ asset('assets/img/placeholder/avatar.jpg') }};">
								<span class="hidden-xs">{{ Auth::user()->name }}</span>
							</a>
							<ul class="dropdown-menu">
								<li class="user-header">
                                    <img class="img-circle lazy" alt="{{ Auth::user()->name }}" data-src="{{ Auth::user()->avatar }}" src="{{ asset('assets/img/placeholder/avatar.jpg') }}" onerror="this.onerror=null;this.src='{{ asset('assets/img/placeholder/avatar.jpg') }};">
									<p>
										{{ Auth::user()->name }}
										<small>Join Date: {{ date('j M Y', strtotime(Auth::user()->created_at)) }}</small>
									</p>
								</li>
								 
								<li class="user-footer"> 
									<div class="pull-right">
										<a href="{{ route('admin.logout') }}" class="btn btn-default btn-flat">Sign out</a>
									</div>
								</li>
							</ul>
						</li> 
					</ul>
				</div>
			</nav>
		</header>

		<aside class="main-sidebar">
			<!-- sidebar -->
			@include('backend.inc.sidebar')
			<!-- sidebar -->
		</aside>

		<div class="content-wrapper">  
			<!-- Main content -->
            @yield('content')
			<!-- /.content -->
		</div>

		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>Version</b> 2.3.0
			</div>
			<strong>Copyright &copy; {{ date("Y") }} <a href="{{ route('home') }}">{{ env('APP_NAME') }}</a>.</strong> All rights reserved.
		</footer>
	</div>

	<script src="{{ asset('assets/backend/libs/jQuery/jQuery-2.1.4.min.js') }}"></script>
	<script src="{{ asset('assets/backend/libs/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/backend/libs/iCheck/icheck.min.js') }}"></script>
	<script src="{{ asset('assets/backend/libs/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/backend/libs/select2/select2.full.min.js') }}"></script>
	<script src="{{ asset('assets/backend/libs/input-mask/jquery.inputmask.js') }}"></script>
	<script src="{{ asset('assets/backend/libs/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
	<script src="{{ asset('assets/backend/libs/input-mask/jquery.inputmask.extensions.js') }}"></script>
	<script src="{{ asset('assets/backend/libs/moment/moment.min.js') }}"></script>
	<script src="{{ asset('assets/backend/libs/daterangepicker/daterangepicker.js') }}"></script>
	<script src="{{ asset('assets/backend/libs/colorpicker/bootstrap-colorpicker.min.js') }}"></script>
	<script src="{{ asset('assets/backend/libs/timepicker/bootstrap-timepicker.min.js') }}"></script>
	<script src="{{ asset('assets/backend/libs/fastclick/fastclick.min.js') }}"></script>
	<script src="{{ asset('assets/backend/js/app.min.js') }}"></script>
	<script src="{{ asset('assets/backend/libs/sparkline/jquery.sparkline.min.js') }}"></script>
	<script src="{{ asset('assets/backend/libs/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
	<script src="{{ asset('assets/backend/libs/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
	<script src="{{ asset('assets/backend/libs/slimScroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ asset('assets/backend/libs/datatables/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('assets/backend/libs/datatables/dataTables.bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/backend/libs/toastr/toastr.min.js') }}"></script>
	<script src="{{ asset('assets/backend/js/demo.js') }}"></script>
    <script src="{{ asset('assets/js/lazysizes.js') }}"></script>
	<script src="{{ asset('assets/backend/libs/sweetalert2/sweetalert2.js') }}"></script>

	@yield('script')
	
    <script>
	    var main_url = "{{ url('/') }}";
 
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
				toastr.options.extendedTimeOut = 1000;
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
						}, delay + 20000);
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

		// sidebar menu hide/show
        $('[data-toggle="event-side-menu"] a').each(function () {
            var pageUrl = window.location.href.split(/[?#]/)[0];
            if (this.href == pageUrl || $(this).hasClass("open")) {
                $(this).addClass("menu-open");
                $(this).closest(".sub_menu_parent").addClass("active"); 
                $(this).closest(".sub_menu li a").css({ 'color' : 'cornflowerblue' });
            }
        });


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

        $(function () {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": false,
				"info": true,
				"autoWidth": false
			});
		});

        // $(function () {
		// 	// Replace the <textarea id="editor1"> with a CKEditor
		// 	// instance, using default configuration.
		// 	CKEDITOR.replace('editor1');
		// 	//bootstrap WYSIHTML5 - text editor
		// 	$(".textarea").wysihtml5();
		// });
		
		$(function () {
			//Initialize Select2 Elements 
			$(".select2").select2();

			//Datemask dd/mm/yyyy
			$("#datemask").inputmask("dd/mm/yyyy", { "placeholder": "dd/mm/yyyy" });
			//Datemask2 mm/dd/yyyy
			$("#datemask2").inputmask("mm/dd/yyyy", { "placeholder": "mm/dd/yyyy" });
			//Money Euro
			$("[data-mask]").inputmask();

			//Date range picker
			$('#reservation').daterangepicker();
			//Date range picker with time picker
			$('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' });
			//Date range as a button
			$('#daterange-btn').daterangepicker(
				{
					ranges: {
						'Today': [moment(), moment()],
						'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
						'Last 7 Days': [moment().subtract(6, 'days'), moment()],
						'Last 30 Days': [moment().subtract(29, 'days'), moment()],
						'This Month': [moment().startOf('month'), moment().endOf('month')],
						'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
					},
					startDate: moment().subtract(29, 'days'),
					endDate: moment()
				},
				function (start, end) {
					$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
				}
			);

			//iCheck for checkbox and radio inputs
			$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
				checkboxClass: 'icheckbox_minimal-blue',
				radioClass: 'iradio_minimal-blue'
			});
			//Red color scheme for iCheck
			$('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
				checkboxClass: 'icheckbox_minimal-red',
				radioClass: 'iradio_minimal-red'
			});
			//Flat red color scheme for iCheck
			$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
				checkboxClass: 'icheckbox_flat-green',
				radioClass: 'iradio_flat-green'
			});

			//Colorpicker
			$(".my-colorpicker1").colorpicker();
			//color picker with addon
			$(".my-colorpicker2").colorpicker();

			//Timepicker
			$(".timepicker").timepicker({
				showInputs: false
			});
		});
	</script>

</body>

</html>