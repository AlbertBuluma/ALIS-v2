<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400&subset=latin-ext,latin" rel="stylesheet" type="text/css">-->
    <link rel="shortcut icon" href="{{ asset('i/ug_favicon.ico') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ui-lightness/jquery-ui-min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-theme.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dataTables.bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/layout.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/select2.min.css') }}">

    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }} "></script>
    <script type="text/javascript" src="{{ asset('js/jquery-ui-min.js') }} "></script>
    <script type="text/javascript" src="{{asset('js/moment.js')}} "></script>
    <script type="text/javascript" src="{{asset('js/combodate.js')}} "></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }} "></script>
    <script type="text/javascript" src="{{ asset('js/jquery.dataTables.js') }} "></script>
    <script type="text/javascript" src="{{ asset('js/dataTables.bootstrap.js') }} "></script>
    <script type="text/javascript" src="{{ asset('js/script.js') }} "></script>
    <script type="text/javascript" src="{{ asset('js/select2.min.js') }} "></script>
    <!-- print special used in bb module -->
    <script type="text/javascript" src="{{ asset('js/print_special.js') }} "></script>
    <!--   -->

    <script type="text/javascript" src="{{ asset('js/validator.min.js') }} "></script>
    <script type="text/javascript" src="{{ asset('js/stockcard.js') }} "></script>
    <script type="text/javascript" src="{{ asset('js/jquery.easing.1.3.min.js') }} "></script>
    <script type="text/javascript" src="{{ asset('js/tinynav.js') }} "></script>
    <script type="text/javascript" src="{{ asset('js/perfect-scrollbar-0.4.8.with-mousewheel.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/common.js') }}"></script>
    <script src="{{ asset('js/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }} "></script>



    <!-- jQuery barcode script -->
    <script type="text/javascript" src="{{ asset('js/jquery-barcode-2.0.2.js') }}"></script>
    <title>{{ config('kblis.name') }} </title>
</head>
<body class="side_nav_hover">
@include("header")

<!-- main content -->
<div id="main_wrapper">
    <div class="page_content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @yield("content")
                </div>
            </div>
        </div>
    </div>
</div>

<!-- side navigation -->
@include("sidebar")


@include("footer")
</body>
</html>
