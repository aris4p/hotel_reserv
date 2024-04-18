<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" >
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    {{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> --}}

    <!-- Favicons -->
    <link href="{{ asset('admin/img/logo-wetoko.png')}}" rel="icon">
    <link href="{{ asset('admin/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="//fonts.gstatic.com" rel="preconnect">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/vendor/simple-datatables/style.css')}}" rel="stylesheet">
    @stack('css')
    <link href="//cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    {{-- datatables --}}
    <link href="//cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

    <link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet" />


    <!-- Template Main CSS File -->
    <link href="{{ asset('admin/css/style.css')}}" rel="stylesheet">
</head>
<body>


    @include('layout.partials_admin.header')
    @include('layout.partials_admin.sidebar')

    <main id="main" class="main">
        @yield('body')

    </main><!-- End #main -->
    @include('layout.partials_admin.footer')






    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->

    <script src="{{ asset ('admin/vendor/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{ asset ('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset ('admin/vendor/chart.js/chart.min.js')}}"></script>
    <script src="{{ asset ('admin/vendor/echarts/echarts.min.js')}}"></script>
    <script src="{{ asset ('admin/vendor/quill/quill.min.js')}}"></script>
    <script src="{{ asset ('admin/vendor/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{ asset ('admin/vendor/tinymce/tinymce.min.js')}}"></script>
    <script src="{{ asset ('admin/vendor/php-email-form/validate.js')}}"></script>


    <!-- Template Main JS File -->
    <script src="{{ asset ('admin/js/main.js')}}"></script>




</body>
</html>
