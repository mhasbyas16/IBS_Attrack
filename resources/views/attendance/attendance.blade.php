@extends('index')
@section('isi')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee's Attendance</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <div class="card-title">
                  Record Employee Attendance
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-xs-12">
                      <!-- jQuery Knob -->
                    <div class="box box-solid">
                        <!-- begin data alat-->
                      <form class="form-horizontal">
                        <div class="box-body">
                          <table id="pegawais" class="table table-bordered table-striped text-center">
                            <thead>
                            <tr>
                              <th>No.</th>
                              <th>Date</th>
                              <th>Employee ID</th>
                              <th>Device Time</th>
                              <th>Server Time</th>
                              <th>Check In</th>
                              <th>Location In</th>
                              <th>Check Out</th>
                              <th>Location Out</th>
                              <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            
                            <tr>
                              <td>1</td>
                              <td>10/12/2019</td>
                              <td>12345</td>
                              <td>08:00:00</td>
                              <td>08:01:00</td>
                              <td>08:00:00</td>
                              <td>231,2312313</td>
                              <td>18:00:00</td>
                              <td>231,2312313</td>
                              <td>
                                <a href="" onclick="return confirm('Yakin ubah status menjadi diterima?')" class="btn btn-social-icon btn-success">
                                  <i class="fa fa-check"></i></a>
                                <a href="" onclick="return confirm('Yakin ubah status menjadi ditolak?')" class="btn btn-social-icon btn-danger">
                                  <i class="fa fa-ban"></i></a>
                              </td>
                            </tr>
                            
                            </tbody>
                            <tfoot>
                            <tr>
                              <th>No.</th>
                              <th>Date</th>
                              <th>Employee ID</th>
                              <th>Device Time</th>
                              <th>Server Time</th>
                              <th>Check In</th>
                              <th>Location In</th>
                              <th>Check Out</th>
                              <th>Location Out</th>
                              <th>Action</th>
                            </tr>
                            </tfoot>
                          </table>
                        </div>
                      </form>
                        <!-- /.box-body -->
                    </div>
                      <!-- /.box -->
                  </div>
                    <!-- /.col -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Ekko Lightbox -->
<script src="../plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Filterizr-->
<script src="../plugins/filterizr/jquery.filterizr.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>
</body>
</html>

@endsection