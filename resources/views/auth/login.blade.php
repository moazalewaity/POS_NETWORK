<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title> Nour.Net شبكة </title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- favicon -->		
		<link rel="shortcut icon" type="image/x-icon" href="img/logo/favicon.png">
		<!-- all css here -->
		<!-- bootstrap css -->
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/bootstrap.min.css') }}">
        <!-- bootstrap RTL -->
		<!-- <link rel="stylesheet" href="css/bootstrap-rtl.css') }}"> -->
        <!-- Owl Stylesheets -->
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="css/owl.theme.default.min.css') }}">
        <!--  <link rel="stylesheet" {{ asset('dashboard_files/href="css/animate.min.css') }}"> -->
		<!-- font-awesome css -->
        <!-- <link rel="stylesheet" href="css/font-awesome.min.css') }}"> -->
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/font-awesome-all.css') }}">
        <!-- datatable -->
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/table/dataTables.bootstrap4.min.css') }}">
        <!-- switch -->
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/lc_switch.css') }}">
        <!-- Gallery -->
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/gallery/simple-lightbox.css') }}">
        <!--upload images  -->
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/upload/fancy_fileupload.css') }}">
        <!--datepicker  -->
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/datepicker/datepicker.css') }}">
		<!-- style css -->
		<link rel="stylesheet" href="{{ asset('dashboard_files/css/style.css') }}">
		<!-- responsive css -->
		<link rel="stylesheet" href="{{ asset('dashboard_files/css/responsive.css') }}">
		<!-- modernizr css -->
		<!-- <script src="js/vendor/modernizr-2.8.3.min.js'"></script> -->
	</head>
    <body class="sidebar-is-reduced">






<!-- // Header -->

<!-- Login page  -->
<section class="login-page">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col col-lg-4">
                <div class="login-form">
                    <div class="main-logo">
                       <h3> شبكة Nour.Net </h3>
                    </div>
                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        @method('post')

                        @include('dashboard.partials._errors')
                        <h3> تسجيل الدخول </h3>
                        <div class="form-group ">
                            <label> البريد الالكترونى  </label>
                            <input type="email" name="email" class="form-control" placeholder=" البريد الالكترونى  ">
                        </div>
                        <div class="form-group ">
                            <label> كلمة المرور  </label>
                            <input type="password"  class="form-control" name="password" autocomplete="new-password" placeholder=" ******************* " minlength="6">
                            <div class="eye-password" id="show-password">
                                <i class="fa fa-eye-slash show-pass" aria-hidden="true"></i>
                            </div>
                            
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="remember" class="custom-control-input" id="remember">
                                <label class="custom-control-label" for="remember">تذكرنى </label>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-login"> Login </button>    

                        
                        <!-- <p class="text-center">انشاء حساب جديد <a href="{{ route('register') }}"> تسجيل </a></p> -->

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Footer -->



    	<footer>

</footer>

        <!-- all js here -->
		<!-- jquery -->
		<script src="{{ asset('dashboard_files/js/jquery-3.5.1.min.js') }}"></script>
		<!-- bootstrap js -->
		<script src="{{ asset('dashboard_files/js/bootstrap.bundle.min.js') }}"></script>
		<!-- owl.carousel js -->
		<script src="{{ asset('dashboard_files/js/owl.carousel.min.js') }}"></script>
		<!-- magnific js -->
        <script src="{{ asset('dashboard_files/js/font-awesome-all.js') }}"></script>
		<!-- Charts js -->
		<script src='{{ asset('dashboard_files/js/chartjs/chart.min.js') }}'></script>
		<script src="{{ asset('dashboard_files/js/chartjs/chart.js') }}"></script>
		<!-- Datatable -->
		<script src="{{ asset('dashboard_files/js/table/jquery.dataTables.min.js') }}"></script>
		<!-- switch -->
		<script src="{{ asset('dashboard_files/js/lc_switch.js') }}"></script>
		<!-- Gallery -->
		<script src="{{ asset('dashboard_files/js/gallery/simple-lightbox.js') }}"></script>
		<!--upload images  -->
		<script src="{{ asset('dashboard_files/js/upload/jquery.ui.widget.js') }}"></script>
		<script src="{{ asset('dashboard_files/js/upload/jquery.fileupload.js') }}"></script>
		<script src="{{ asset('dashboard_files/js/upload/jquery.fancy-fileupload.js') }}"></script>
		<!-- Datepicker -->
		<script src="{{ asset('dashboard_files/js/datepicker/datepicker.js') }}"></script>
		<!-- Search -->

		<!-- plugins js -->
        <script src="{{ asset('dashboard_files/js/plugins.js') }}"></script>
		<!-- main js -->
		<script src="{{ asset('dashboard_files/js/main.js') }}"></script>

	</body>
</html>