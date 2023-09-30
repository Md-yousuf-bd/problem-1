<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Probem-1</title>
    <!-- Bootstrap Css -->
    <link href="{{ URL::asset('assets/admin/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ URL::asset('assets/admin/assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ URL::asset('assets/admin/assets/css/app.min.css') }}" id="app-style" rel="stylesheet"
        type="text/css" />
</head>
<style>
    body {
        overflow-x: hidden;
}

</style>
<body data-sidebar="dark ">


    @include('layouts.frontend.partial.header')

    @yield('content')

    @include('layouts.frontend.partial.footer')


    <!-- END wrapper -->


    {{-- <script>
            var resizefunc = [];
        </script> --}}
    <script src="{{ asset('assets/admin/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/libs/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/js/pages/dashboard.init.js') }}"></script>
    {{-- <script src="{{ asset('assets/admin/assets/js/app.js') }}"></script> --}}
    <script src="{{ asset('assets/admin/assets/libs/parsleyjs/parsley.min.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/js/pages/form-validation.init.js') }}"></script>
    {{-- custom js --}}
    <script src="{{ asset('assets/admin/assets/custom/custom.js') }}"></script>
</body>

</html>
