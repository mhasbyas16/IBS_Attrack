@extends('template.template')
@section('isi')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Department Group's Data</h1>
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
                  Department Group's List
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <div class="box box-solid">
                          <form class="form-horizontal" action="" method="">
                            <div class="box-body">

                              <div class="row col-md-12">
                                <label class="col-md-12"><h4>Input Department Group</h4><hr></label>
                              </div>

                              <div class="row col-md-12 mt-2">
                                <label class="col-sm-3 control-label" style="text-align: left; padding-left: 20pt">ID</label>
                                <div class="col-sm-5">
                                    <input type="text" name="idd" id="idd" value="" hidden="true">
                                    <input type="text" class="form-control" name="idat" id="idat" value="" readonly>
                                </div>
                              </div>
                              <div class="row col-md-12 mt-2">
                                <label class="col-sm-3 control-label" style="text-align: left; padding-left: 20pt">Department Group Name</label>
                                <div class="col-sm-5">
                                    <input type="text" name="idd" id="idd" value="" hidden="true">
                                    <input type="text" class="form-control" name="idat" id="idat" value="">
                                </div>
                              </div>
                            </div>
                            <div class="row mt-5 col-md-12">
                              <ul class="left" style="padding-left: 530px">
                                <button class="btn btn-success" href="#">Save</button>
                                <button class="btn btn-secondary" href="#">Cancel</button>
                              </ul>
                            </div>
                          </form>
                          <hr>
                    </div>
                  </div>
                </div>
                <div class="row mt-5 mb-5 ml-4">
                  <div class="col-xs-12">
                      <!-- jQuery Knob -->
                    <div class="box box-solid">
                        <!-- begin data alat-->
                      <form class="form-horizontal">
                        <div class="box-body">
                          <table id="pegawais" class="table table-bordered table-striped text-center">
                            <thead>
                            <tr>
                              <th>ID</th>
                              <th>Department Group Name</th>
                              <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                              <td>TC</td>
                              <td>Technical</td>
                              <td>
                                <form action="" method="">
                                    <input type="submit" class="btn btn-danger btn-sm" href="" value="Delete">
                                </form>
                              </td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                              <th>ID</th>
                              <th>Department Group Name</th>
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