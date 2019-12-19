@if (!Session::has('id'))
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
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
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
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- PAGE SCRIPTS -->
<script src="{{asset('dist/js/pages/dashboard2.js')}}"></script>
<!-- custom js-->
<script src="{{asset('js/system.js')}}"></script>
<script>
//AJAX
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $("meta[name='csrf_token']").attr("content"),
        }
    });
//DEPARTEMENT GROUP
    //DELETE
    $("body").on("click","#deptGroupDel",function(e){
        e.preventDefault();
        var dept_id=$(this).data("id");
        confirm('apakah anda akan menghapus data ini?');
        
        $.ajax({
            method: "GET",
            url: "{{url('/dept_grup/destroy')}}/"+dept_id,
            success: function(del){
                $("#id_dept_"+dept_id).remove();

                $(function(){
                  const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000
                  });

                  Toast.fire({
                  type: 'success',
                  title: 'Sukses Menghapus Data'
                  });
                });
            },
            error: function (del) {
                console.log("Error:",del);
            }
        });
    });

//DEPT
//DELETE
  $("body").on("click","#DeptDel",function(e){
    e.preventDefault();
    var id=$(this).data("id");
    confirm('apakah anda akan menghapus data ini?');

    $.ajax({
      method: "GET",
      url: "{{url('/dept/destroy')}}/"+id,
      success: function(dept){
        $("#id_dept_"+id).remove();
        $(function(){
          const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
          });
          Toast.fire({
          type: 'success',
          title: 'Sukses Menghapus Data'
          });
        });
      },
      error: function(dept){
        condole.log('Error:',dept);
      }
    });
  });

//JOB TYPE
//COMBOBOX
  $("#IDKelDept").on("change",function(e){
    e.preventDefault();
    var idkeldept= $(this).val();

    $.ajax({
      method: "GET",
      url: "{{url('/job_type/cmbx')}}/"+idkeldept,
      success: function(cmbx){
        console.log(cmbx);
        $("#DeptNama").empty();
        $.each(cmbx.isi,function(key,val){
          $("#DeptNama").append("<option value='"+val.id+"'>"+val.nama+"</option>");
        });
      },
      error: function(cmbx){
        console.log("Error:",cmbx);
      }
    });
  });
//DELETE
  $("body").on("click","#JobTypeDel", function(e){
    e.preventDefault();
    var idJob=$(this).data("id");

    confirm('apakah anda akan menghapus data ini?');
    $.ajax({
      method: "GET",
      url: "{{url('/job_type/destroy')}}/"+idJob,
      success: function(result){
        $("#id_job_"+idJob).remove();
        $(function(){
          const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000
          });
          Toast.fire({
          type: 'success',
          title: 'Sukses Menghapus Data'
          });
        });
      }
    });
  });

});
</script>
</body>
</html>
