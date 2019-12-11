@extends('template.template')
@section('isi')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee's Leaves</h1>
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
                  Record Employee Leaves
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
                              <th>ID</th>
                              <th>Customer Name</th>
                              <th>Customer Site</th>
                              <th>PIC</th>
                              <th>Phone Number</th>
                              <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            
                            <tr>
                              <td>1</td>
                              <td>C01</td>
                              <td>BRI</td>
                              <td>GTI</td>
                              <td>Dono</td>
                              <td>08387283298</td>
                              <td>
                                <a href="" class="btn btn-social-icon btn-success">
                                  <i class="fa fa-edit"></i></a>
                                <a href="" class="btn btn-social-icon btn-danger">
                                  <i class="fa fa-trash"></i></a>
                              </td>
                            </tr>
                            
                            </tbody>
                            <tfoot>
                            <tr>
                              <th>No.</th>
                              <th>ID</th>
                              <th>Customer Name</th>
                              <th>Customer Site</th>
                              <th>PIC</th>
                              <th>Phone Number</th>
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