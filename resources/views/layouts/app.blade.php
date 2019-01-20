<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" /> 

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>

    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css" rel="stylesheet" />   

    <title>{{ $page_title or "Portal de Agendamento" }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset("/assets/dist/css/AdminLTE-full.css") }}">
    <link rel="stylesheet" href="{{ asset("/assets/dist/css/skins/skin-blue.css") }}">
    <link rel="stylesheet" href="{{ asset("/assets/plugins/select2/select2.min.css") }}">

    {{-- Icon title --}}
    <link rel="shortcut icon" href="{{ asset('img/icon_title.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('img/icon_title.png') }}" type="image/x-icon">
</head>

<body class="skin-blue">

<div class="wrapper">

    <!-- Header -->
    @include('layouts.header')

    <!-- Sidebar -->
    @if (Auth::user()->perfil != 3)
        @include('layouts.sidebar')
    @endif

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        {{-- <section class="content-header">
            <h1>
                {{ $page_title or "Portal de Agendamento" }}
                <small>{{ $page_description or null }}</small>
            </h1>
            You can dynamically generate breadcrumbs here
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
        </section> --}}

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Footer -->

</div><!-- ./wrapper -->
    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.2.3 -->
    <script src="{{ asset("/assets/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <!-- Incui os scripts especificos da página -->
    @yield('pageScripts')

     <!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>     
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="{{ asset("/assets/dist/js/app.min.js") }}" type="text/javascript"></script>

    <script src="http://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js"></script>
    <script src="{{ asset("/assets/plugins/fullcalendar/pt-br.js") }}"></script>    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>


</body>
</html>


