@extends('template.template')
@section('isi')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Setting Account</h1>
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
                  Setting Your Account
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <!-- jQuery Knob -->
                    <div class="box box-solid">

                          <form class="form-horizontal" action="" method="">
                            {{ csrf_field() }}
                            <div class="box-body">

                              <div class="row col-md-12">
                                <label class="col-md-12"><h4>Account Detail</h4><hr></label>
                              </div>
                              <div class="row col-md-12 mt-2">
                                <label class="col-sm-3 control-label" style="text-align: left; padding-left: 20pt">NIP</label>
                                <div class="col-sm-5">
                                  <input type="text" class="form-control" name="nip" id="nip" readonly="">
                                </div>
                              </div>
                              <div class="row col-md-12 mt-2">
                                <label class="col-sm-3 control-label" style="text-align: left; padding-left: 20pt">Name</label>
                                <div class="col-sm-5">
                                  <input type="text" class="form-control" name="name" id="name" readonly="">
                                </div>
                              </div>
                              <div class="row col-md-12 mt-2">
                                <label class="col-sm-3 control-label" style="text-align: left; padding-left: 20pt">Jabatan</label>
                                <div class="col-sm-5">
                                  <input type="text" class="form-control" name="jabatan" id="jabatan" readonly="">
                                </div>
                              </div>
                              <div class="row col-md-12 mt-2">
                                <label class="col-sm-3 control-label" style="text-align: left; padding-left: 20pt">Jenis Kelamin</label>
                                <div class="col-sm-5">
                                  <input type="text" class="form-control" name="jk" id="jk" readonly="">
                                </div>
                              </div>
                              <div class="row col-md-12 mt-2">
                                <label class="col-sm-3 control-label" style="text-align: left; padding-left: 20pt">E-Mail</label>
                                <div class="col-sm-5">
                                  <input type="text" class="form-control" name="email" id="email" readonly="">
                                </div>
                              </div>
                              <div class="row col-md-12 mt-2">
                                <label class="col-sm-3 control-label" style="text-align: left; padding-left: 20pt">Alamat</label>
                                <div class="col-sm-5">
                                  <input type="text" class="form-control" name="alamat" id="alamat" readonly="">
                                </div>
                              </div>
                              <div class="row col-md-12 mt-2">
                                <label class="col-sm-3 control-label" style="text-align: left; padding-left: 20pt">IMEI</label>
                                <div class="col-sm-5">
                                  <input type="text" class="form-control" name="imei" id="imei" readonly="">
                                </div>
                              </div>
                              <div class="row col-md-12 mt-2">
                                <label class="col-sm-3 control-label" style="text-align: left; padding-left: 20pt">Password</label>
                                <div class="col-sm-5">
                                  <input type="text" class="form-control" name="password" id="password" readonly="">
                                </div>
                              </div>
                            </div>
                            <div class="row mt-4 col-md-12">
                              <ul class="text-right col-md-8" style="padding-right: 10px">
                                <button class="btn btn-success" href="#">Edit</button>
                              </ul>
                            </div>
                          </form>
                          <hr>
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