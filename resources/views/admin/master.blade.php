
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@yield('title')</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <meta name="_token" content="{{ csrf_token() }}"/>
        <link rel="stylesheet" href="/css/bootstrap-tagsinput.css">
        <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="/bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="/dist/css/skins/skin-blue.min.css">
        <link rel="stylesheet" href="/css/admin.css">
        <script  src="/ckeditor/ckeditor.js"></script>
        <script src="/bower_components/jquery/dist/jquery.min.js"></script>
       
        <!-- Google Font -->
        <link rel="stylesheet"
                href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

        <!-- Main Header -->
        @include('./admin/layouts/header')
        {{-- End Header --}}

        <!-- Left side column. contains the logo and sidebar -->
        @include('./admin/layouts/sidebar-left')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    @yield('title')
                </h1>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-warning">
                            <ul>
                                <li>{{ $error }}</li>
                            </ul>
                        </div>
                    @endforeach
                @endif
                @if(session('success'))
               
                <br/>
                <div class="alert alert-success" id="hienthi"  style="position:absolute; z-index:3; left:40%">
                        <i class="fa fa-check"></i> {{ session('success') }}
                </div>
                <script>
                        function an(){
                            $("#hienthi").delay(1500).fadeOut();
                        }
                        setTimeout(an, 0);
                    </script>
                @endif
                @if(session('danger'))
                <br/>
                <div class="alert alert-warning">
                    <ul>
                        <li>{{ session('danger') }}</li>
                    </ul>
                </div>
                @endif

                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i>Quản lý</a></li>
                    <li class="active">@yield('category')</li>
                </ol>
            </section>
    
            <!-- Main content -->
            <section class="content container-fluid">
                @yield('content')
            </section>
            <!-- /.content -->  
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        @include('./admin/layouts/footer')
        <!-- ./wrapper -->

        <!-- REQUIRED JS SCRIPTS -->

        <!-- jQuery 3 -->
       
        {{-- Load Js --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- AdminLTE App -->
        <script src="/dist/js/adminlte.min.js"></script>
        @yield('script')
        <script src="/js/1.js"></script>
    </body>
</html>