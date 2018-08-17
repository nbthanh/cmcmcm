<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('admin.head_title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ url('/backend/') }}/assets/css/normalize.css">
    <link rel="stylesheet" href="{{ url('/backend/') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/backend/') }}/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url('/backend/') }}/assets/css/themify-icons.css">
    <link rel="stylesheet" href="{{ url('/backend/') }}/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{ url('/backend/') }}/assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{ url('/backend/') }}/assets/scss/style.css">
    <link href="{{ url('/backend/') }}/assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
     <script src="{{ asset('js/ckeditor') }}/ckeditor.js"></script>
    @include('ckfinder::setup')
    
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    @yield('admin.header')
</head>
<body>
    <!-- Left Panel -->
    @include('backend.partial.left_panel')
    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        @include('backend.partial.header_panel')
        <!-- /header -->
        <!-- Breadcrumb-->
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                    @yield('admin.breadcrumb')
                    </div>
                </div>
            </div>
        </div>
        <!-- /Breadcrumb -->

        <div class="content mt-3">
            @yield('admin.body_content')
        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="{{ url('/backend/') }}/assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="{{ url('/backend/') }}/assets/js/plugins.js"></script>
    <script src="{{ url('/backend/') }}/assets/js/main.js"></script>
    <!-- <script src="{{ url('/backend/') }}/assets/js/lib/chart-js/Chart.bundle.js"></script> -->
    <!-- <script src="{{ url('/backend/') }}/assets/js/dashboard.js"></script> -->
   <!--  <script src="{{ url('/backend/') }}/assets/js/widgets.js"></script> -->
    <!-- <script src="{{ url('/backend/') }}/assets/js/lib/vector-map/jquery.vmap.js"></script> -->
    <!-- <script src="{{ url('/backend/') }}/assets/js/lib/vector-map/jquery.vmap.min.js"></script> -->
    <!-- <script src="{{ url('/backend/') }}/assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="{{ url('/backend/') }}/assets/js/lib/vector-map/country/jquery.vmap.world.js"></script> -->
    <script>
        ( function ( $ ) {
            /*"use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );*/
            jQuery('.sufee-alert.alert-success').delay(3000).slideUp();
            jQuery('.sufee-alert.alert-danger').delay(10000).slideUp();
        } )( jQuery );
        var cmClass = {
            confirm: function(msg){
                if (window.confirm(msg)) {
                    return true;
                }else {
                    return false;
                }
            }
        }
    </script>
    @yield('admin.footer')
</body>
</html>
