<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Fondation | @yield('title','Default')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/jqvmap/jqvmap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('ijabocrop/ijaboCropTool.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/fontgoogle.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="sidebar-mini layout-fixed sidebar-collapse">
    <div class="wrapper">

        @include('layouts.template.admin.navbar')
        @include('layouts.template.home.sidebar_profile')
        @yield('content')
        @include('layouts.template.admin.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('admin/plugins/chart.js/Chart.min.js')}}"></script>
    <script src="{{ asset('admin/plugins/sparklines/sparkline.js')}}"></script>
    <script src="{{ asset('admin/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{ asset('admin/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <script src="{{ asset('admin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <script src="{{ asset('admin/plugins/moment/moment.min.js')}}"></script>
    <script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <script src="{{ asset('admin/dist/js/adminlte.js')}}"></script>
    <script src="{{ asset('admin/dist/js/pages/dashboard.js')}}"></script>
    <script src="{{ asset('admin/dist/js/demo.js')}}"></script>

    <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
    <script src="{{ asset('ijabocrop/ijaboCropTool.min.js')}}"></script>


    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    <script>
        $('#picture').ijaboCropTool({
            preview: '.image-previewer',
            // setRatio: 1,
            // allowedExtensions: ['jpg', 'jpeg', 'png'],
            buttonsText: ['Cropper', 'Annuler'],
            // buttonsColor: ['#30bf7d', '#ee5155', -15],
            processUrl: '{{ route("crop") }}',
            withCSRF: ['_token', '{{ csrf_token() }}'],
            onSuccess: function(message, element, status) {
                alert(message);
            },
            onError: function(message, element, status) {
                alert(message);
            }
        });
    </script>


</body>

</html>
