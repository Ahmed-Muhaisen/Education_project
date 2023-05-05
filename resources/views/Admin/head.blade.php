<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title',@env('APP_NAME'))</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />

    <!-- Custom fonts for this template-->
    <link href="{{ asset('webadmin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('webadmin/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <link href="{{ asset('webadmin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">


@yield('head_content')


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('webadmin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('webadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('webadmin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('webadmin/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('webadmin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('webadmin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('webadmin/js/demo/datatables-demo.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>


</body>

</html>
