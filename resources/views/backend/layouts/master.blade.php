<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title') - Welcome to Admin Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/mdb.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/sidenav.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/datatables-select.min.css') }}">
</head>

<body class="fix-header fix-sidebar">

    @include('backend.layouts.menu')


    @yield('content')



    </div>
    </div>

    <script type="text/javascript" src="{{ asset('backend/js/jquery-3.4.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/axios.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/mdb.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/jquery.slimscroll.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/sidebarmenu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/sticky-kit.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/custom.min-2.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/datatables-select.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/custom.js') }}"></script>

    
    @yield('script')

</body>

</html>