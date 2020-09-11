<!doctype html>
<html lang="ar">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title> لوحة التحكم-@yield('title') </title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- favicon -->		
		<link rel="shortcut icon" type="image/x-icon" href="img/logo/favicon.png">
		<!-- all css here -->
		<!-- bootstrap css -->
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/bootstrap.min.css') }}">
        <!-- bootstrap RTL -->
		<link rel="stylesheet" href="{{ asset('dashboard_files/css/bootstrap-rtl.css') }}">
        <!-- Owl Stylesheets -->
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/owl.theme.default.min.css') }}">
        <!--  <link rel="stylesheet" href="css/animate.min.css"> -->
		<!-- font-awesome css -->
        <!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->
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
		<!-- <script src="js/vendor/modernizr-2.8.3.min.js"></script> -->


        <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_files/print.min.css')}}">
<script src="{{ asset('dashboard_files/print.min.js')}}"></script>
        
    {{--noty--}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/noty/noty.css') }}">
    <script src="{{ asset('dashboard_files/plugins/noty/noty.min.js') }}"></script>

	</head>
    <body class="sidebar-is-reduced">

   @if(  \Request::segment('3') != "generate-pdf")     
        @include('layouts.dashboard._header')

        @include('layouts.dashboard._aside')
@endif

     



<main class="l-main">

     @include('dashboard.partials._errors') 
     @include('dashboard.partials._sessions')
    @yield('content') 

</main>







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
        <!-- <script src="{{ asset('dashboard_files/js/chartjs/chart.min.js') }}"></script> -->
        <!-- <script src="{{ asset('dashboard_files/js/chartjs/chart.js') }}"></script> -->
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

            {{--select 2--}}
<script src="{{ asset('dashboard_files/aa/select2.min.js') }}"></script>

<!-- <script src="{{ asset('dashboard_files/aa/main.js') }}"></script> -->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {

        $(document).on('click', '.delete', function (e) {
            e.preventDefault();

            var that = $(this);

            var n = new Noty({
                text: "هل تريد بالتاكيد حذف هذا الصف ",
                killer: true,
                layout: 'topLeft',
                buttons: [
                    Noty.button('نعم', 'btn btn-success mr-2', function () {
                        that.closest('form').submit()
                    }),

                    Noty.button('لا', 'btn btn-danger', function () {
                        n.close();
                    }),
                ]
            });

            n.show();
        });

    });//end of document ready

    //select2
    $('.select2').select2({
        'width': '100%'
    });
    </script>
    </body>
</html>