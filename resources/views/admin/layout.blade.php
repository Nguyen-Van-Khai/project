<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title> @yield('page_title') </title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- site icon -->
    <link rel="icon" href="{{asset('asset/images/fevicon.png')}}" type="image/png" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{asset('asset/css/bootstrap.min.css')}}" />
    <!-- site css -->
    <link rel="stylesheet" href="{{asset('asset/style.css')}}" />
    <!-- responsive css -->
    <link rel="stylesheet" href="{{asset('asset/css/responsive.css')}}" />
    <!-- color css -->
    <link rel="stylesheet" href="{{asset('asset/css/colors.css')}}" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="{{asset('asset/css/bootstrap-select.css')}}" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="{{asset('asset/css/perfect-scrollbar.css')}}" />
    <!-- custom css -->
    <link rel="stylesheet" href="{{asset('asset/css/custom.css')}}" />
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="dashboard dashboard_1">
<div class="full_container">
    <!-- Sidebar -->
    @include('admin.layout.navbar')
    <div class="inner_container">
        <!-- Header -->
        @include('admin.layout.header')

        <!-- right content -->
        <div id="content">
           @yield('content')
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="{{asset('asset/js/jquery.min.js')}}"></script>
<script src="{{asset('asset/js/popper.min.js')}}"></script>
<script src="{{asset('asset/js/bootstrap.min.js')}}"></script>
<!-- wow animation -->
<script src="{{asset('asset/js/animate.js')}}"></script>
<!-- select country -->
<script src="{{asset('asset/js/bootstrap-select.js')}}"></script>
<!-- owl carousel -->
<script src="{{asset('asset/js/owl.carousel.js')}}"></script>
<!-- chart js -->
<script src="{{asset('asset/js/Chart.min.js')}}"></script>
<script src="{{asset('asset/js/Chart.bundle.min.js')}}"></script>
<script src="{{asset('asset/js/utils.js')}}"></script>
<script src="{{asset('asset/js/analyser.js')}}"></script>
<!-- nice scrollbar -->
<script src="{{asset('asset/js/perfect-scrollbar.min.js')}}"></script>
<script>
    var ps = new PerfectScrollbar('#sidebar');
</script>
<!-- custom js -->
<script src="{{asset('asset/js/custom.js')}}"></script>
<script src="{{asset('asset/js/chart_custom_style1.js')}}"></script>

@stack('scripts')
</body>
</html>
