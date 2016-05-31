<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="virtual library">
    <meta name="author" content="Carlos Blanco">

    <title>@yield('title') | Biblioteca Virtual</title>

    <!-- Bootstrap Core CSS -->
    <link href="{!! asset('bower_components/bootstrap/dist/css/bootstrap.min.css') !!}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{!! asset('bower_components/metisMenu/dist/metisMenu.min.css') !!}" rel="stylesheet">

    <!-- Template Custom CSS -->
    <link href="{!! asset('template/css/sb-admin-2.css') !!}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{!! asset('bower_components/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css">

    {{-- Opcional --}}
    @yield('linkcss')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

      <div id="wrapper">
        
        @include('admin.partials.nav')

        <div id="page-wrapper">

            @include('admin.partials.header')

            @if (Session::has('message'))
              <div class="alert alert-{{ Session::get('class') }} alert-dismissible fade in" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">×</span>
                 </button>
                 {!! Session::get('message') !!}
               </div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">×</span>
                   </button>
                   <ul>
                     @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                     @endforeach
                   </ul>
                 </div>
            @endif

            @yield('content')

        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    @include('admin.partials.footer')

    <!-- jQuery -->
    <script src="{!! asset('bower_components/jquery/dist/jquery.min.js') !!}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{!! asset('bower_components/bootstrap/dist/js/bootstrap.min.js') !!}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{!! asset('bower_components/metisMenu/dist/metisMenu.min.js') !!}"></script>

    <!-- Template Custom Theme JavaScript -->
    <script src="{!! asset('template/js/sb-admin-2.js') !!}"></script>

    <!-- Opcional -->
    @yield('linkjs')

</body>

</html>
