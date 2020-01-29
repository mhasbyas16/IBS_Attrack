@if (Session::has('id'))
  @if (Session::get('dept')==100)
    <script>window.location = "{{route('home.index')}}";</script>
  @endif  
@elseif(!Session::has('id'))
  <script>window.location = "{{route('logout.destroy')}}";</script>
@endif
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta id="csrf_token" name="csrf_token" content="{{ csrf_token() }}">

  <title>IBS Attrack Administrator</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{URL::asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{URL::asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{URL::asset('plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{URL::asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{URL::asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{URL::asset('plugins/toastr/toastr.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{URL::asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{URL::asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{URL::asset('dist/css/adminlte.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
    @include('template.navbar')
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
    @include('template.sidebar')
  <!-- /.Main Sidebar Container -->
    
  @yield('isi')


  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar 
  <aside class="control-sidebar control-sidebar-dark">
    Control sidebar content goes here
  </aside>
  < /.control-sidebar -->

  <!-- Main Footer -->
  @include('template.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{URL::asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{URL::asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{URL::asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{URL::asset('dist/js/adminlte.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{URL::asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{URL::asset('plugins/toastr/toastr.min.js')}}"></script>
<!-- Select2 -->
<script src="{{URL::asset('plugins/select2/js/select2.full.min.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{URL::asset('dist/js/demo.js')}}"></script>
<!-- DataTables -->
<script src="{{URL::asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{URL::asset('plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{URL::asset('plugins/raphael/raphael.min.js')}}"></script>
<script src="{{URL::asset('plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{URL::asset('plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{URL::asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- PAGE SCRIPTS -->
<script src="{{URL::asset('dist/js/pages/dashboard2.js')}}"></script>
<!-- custom js-->
<script src="{{URL::asset('js/system.js')}}"></script>
<script>
$(document).ready(function(){
  $("#Att").DataTable();
  $("#Act").DataTable();
  $("#Leave").DataTable();
});
$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
  });
</script>
<!-- AJAX -->
@include("template.ajax")
</body>
</html>
