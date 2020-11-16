<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">      
        <link rel="stylesheet" href="{{ URL::asset('css/ionicons.min.css') }}">  
        <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
       <!-- <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400&subset=latin-ext,latin" rel="stylesheet" type="text/css">-->
        <link rel="shortcut icon" href="{{ URL::asset('i/favicon.png') }}" >
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/ui-lightness/jquery-ui-min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap-theme.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/dataTables.bootstrap.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/layout.css') }}" />

        <script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }} "></script>
        <script type="text/javascript" src="{{ URL::asset('js/jquery-ui-min.js') }}"></script>
        <script type="text/javascript" src="{{URL::asset('js/moment.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/combodate.js')}}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/jquery.dataTables.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/dataTables.bootstrap.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/script.js') }} "></script>
		<!-- print special by justus --><script type="text/javascript" src="{{ URL::asset('js/print_special.js') }} "></script>

        <script type="text/javascript" src="{{ URL::asset('js/validator.min.js') }} "></script>
        <script type="text/javascript" src="{{ URL::asset('js/stockcard.js') }} "></script>   
        <script type="text/javascript" src="{{ URL::asset('js/jquery.easing.1.3.min.js') }} "></script>
        <script type="text/javascript" src="{{ URL::asset('js/tinynav.js') }} "></script>
        <script type="text/javascript" src="{{ URL::asset('js/perfect-scrollbar-0.4.8.with-mousewheel.min.js') }} "></script>
        
        <script type="text/javascript" src="{{ URL::asset('js/common.js') }} "></script>
        <script src="{{ URL::asset('js/jquery.easypiechart.min.js') }}"></script>
        <script src="{{ URL::asset('js/dashboard.js') }}"></script>

        <!-- jQuery barcode script -->
        <script type="text/javascript" src="{{ asset('js/jquery-barcode-2.0.2.js') }} "></script>
        <title>{{ Config::get('kblis.name') }} </title>
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
                            <div class="col-md-12">
                                <a class="col-md-4 col-md-offset-4" href="http://www.aslm.org/"
                                    target="_blank">
                                    <img width="300" src="{{ Config::get('kblis.aslm-logo') }}"
                                        alt="African Society for Laboratory Medicine">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>            
            </div>
        </div>
      
   @include("footer")
    </body>
</html>