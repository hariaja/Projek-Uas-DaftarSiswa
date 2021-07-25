<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="favicon_16.ico"/>
    <link rel="bookmark" href="favicon_16.ico"/>
    <!-- site css -->
    <link rel="stylesheet" href="{{ asset('assets/bootflat/dist/css/site.min.css') }}">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">
    {{-- <link rel="stylesheet" href="{{ asset('assets/DataTables/DataTables-1.10.25/css/jquery.dataTables.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <!-- <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'> -->
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="{{ asset('assets/bootflat/dist/js/site.min.js') }}"></script>
    <style>

      i {
        margin-right: 8px;
        /* margin-left: 8px; */
      }

      table {
        text-align: center !important;
      }

      .tombol {
        margin-bottom: 8px;
      }

      .bagianShow {
        margin-bottom: 10px;
      }

      th {
        text-align: center;
      }

      .detail {
        text-align: center;
      }

      .ck-editor__editable_inline {
        min-height: 300px;
      }

    </style>

    @yield('header')
  </head>
  <body>
    <!--nav-->
    @include('layouts.includes.header')
    <!--header-->
    <div class="container-fluid">
    <!--documents-->
      <div class="row row-offcanvas row-offcanvas-left">
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" role="navigation">
          @include('layouts.includes.sidebar')
        </div>
        <div class="col-xs-12 col-sm-9 content">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar"><span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a> Sidebar Toggle</h3>
            </div>
            <div class="panel-body">
              @yield('content')
            </div>
          </div><!-- content -->
        </div>
      </div>
    </div>
      <!--footer-->
      {{-- @include('layouts.footer') --}}
  </body>
  @include('sweetalert::alert')
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="{{ asset('assets/mentor/js/ckeditor.js') }}"></script>
  <script src="{{ asset('assets/mentor/js/ckeditor.js.map') }}"></script>
  {{-- <script src="{{ asset('assets/DataTables/DataTables-1.10.25/js/jquery.dataTables.js') }}"></script> --}}\
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
  @yield('footer')
</html>

