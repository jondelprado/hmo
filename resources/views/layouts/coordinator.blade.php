<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
    <!-- Scripts -->
    <script src="{{asset('js/jquery.min.js')}}" charset="utf-8"></script>
    <script src="{{asset('js/bootstrap.min.js')}}" charset="utf-8"></script>
    <script src="{{asset('plugins/datatables/jquery.dataTables.js')}}" charset="utf-8"></script>
    <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}" charset="utf-8"></script>
    <script src="{{asset('plugins/toastr/toastr.min.js')}}" charset="utf-8"></script>
    <script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}" charset="utf-8"></script>
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}" charset="utf-8"></script>
    <script src="{{asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}" charset="utf-8"></script>
    <script src="{{asset('plugins/inputmask/jquery.inputmask.bundle.js')}}" charset="utf-8"></script>
    <script src="{{asset('js/adminlte.min.js')}}" charset="utf-8"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper" id="app">
        @include('include.navbar')
        @include('include.coordinator-sidebar')
        <div class="content-wrapper">
          {{-- @include('include.messages') --}}
          @yield('content')
        </div>

        @include('include.footer')
    </div>
</body>
</html>


<script>

  $(function(){
    $(".coordinator_table").DataTable();
    $(".select2").select2();
    $('.duallistbox').bootstrapDualListbox();
    // $(".currency").inputmask({
    //   removeMaskOnSubmit:true,
    // });
  });

</script>
