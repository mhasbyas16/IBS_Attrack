@extends('template.template')
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
                  Record Employee Activity
                </div>
              </div>
              <div class="card-body">
              <br>
                <div class="row">
                  <div class="col-xs-12">
                      <!-- jQuery Knob -->
                    <div class="box box-solid">
                        <!-- begin data alat-->
                        <div class="box-body">
                          <table style="width:100%;">
                            <tr>
                              <td style="width:30%;">Name</td>
                              <td style="width:2%;">:</td>
                              <td style="width:68%;">{{$item->pegawai->nama}}</td>
                            </tr>
                            <tr>
                              <td>Date In</td>
                              <td>:</td>
                              <td>{{$item->device_date_in}}</td>
                            </tr>
                            <tr>
                              <td>Time In</td>
                              <td>:</td>
                              <td>{{$item->device_time_in}}</td>
                            </tr>
                            <tr>
                              <td>Location In</td>
                              <td>:</td>
                              <td><a href="https://www.google.com/maps/search/{{$item->loc_in}}" target="_blank">{{$item->loc_in}}</a></td>
                            </tr>
                            <tr>
                              <td>Date Out</td>
                              <td>:</td>
                              <td>{{$item->device_date_out}}</td>
                            </tr>
                            <tr>
                              <td>Time Out</td>
                              <td>:</td>
                              <td>{{$item->device_time_out}}</td>
                            </tr>
                            <tr>
                              <td>Location Out</td>
                              <td>:</td>
                              <td><a href="https://www.google.com/maps/search/{{$item->loc_out}}" target="_blank">{{$item->loc_out}}</a></td>
                            </tr>
                            <tr>
                              <td>Customer</td>
                              <td>:</td>
                              <td>{{$item->customerSite->customer->cust_name}}</td>
                            </tr>
                            <tr>
                              <td>Customer Site</td>
                              <td>:</td>
                              <td>{{$item->customerSite->customer_site}}</td>
                            </tr>
                            <tr>
                              <td>Job Activity</td>
                              <td>:</td>
                              <td>{{$item->jobActivity->jenis_kegiatan}}</td>
                            </tr>
                            <tr>
                              <td>Picture</td>
                              <td>:</td>
                              <td><img src="{{$item->foto}}" style="width:250px;"/></td>
                            </tr>
                            <tr>
                              <td colspan="3">
                                <a href="javascript:void(0)" onclick="goBack()" class="btn btn-success">Back</a><br><br>
                              </td>
                            </tr>
                          </table>
                                        
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
  function goBack() {
    window.history.back();
  }

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