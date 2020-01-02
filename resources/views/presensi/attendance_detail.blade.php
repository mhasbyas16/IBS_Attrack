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
                  Record Employee Attendance
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
                           @php
                                $awal  = strtotime("".$item->server_date_in." ".$item->server_time_in.""); //waktu awal
                                $akhir = strtotime("".$item->device_date_in." ".$item->device_time_in.""); //waktu akhir
                                $diff  = $akhir - $awal;
                                $jam   = floor($diff / (60 * 60));
                                $menit = $diff - $jam * (60 * 60);
                                $M     = floor( $menit/60);

                                $awal2  = strtotime("".$item->server_date_out." ".$item->server_time_out.""); //waktu awal
                                $akhir2 = strtotime("".$item->device_date_out." ".$item->device_time_out.""); //waktu akhir
                                $diff2  = $akhir2 - $awal2;
                                $jam2   = floor($diff2 / (60 * 60));
                                $menit2 = $diff2 - $jam2 * (60 * 60);
                                $M2     = floor( $menit2/60);
                            @endphp
                            
                            <!--MODAL-->
                                        <div class="row">
                                          <div class="col-xs-4 col-md-4 col-sm-4">Nama</div>
                                          <div class="col-md-1 col-sm-1">:</div>
                                          <div class="col-md-7 col-sm-7">{{$item->pegawai->nama}}</div>
                                        </div>
                                        <div class="row">
                                          <div class="col-4 col-md-4 col-sm-4">Server Date/Time In</div>
                                          <div class="col-md-1 col-sm-1">:</div>
                                          <div class="col-md-7 col-sm-7">{{$item->server_date_in}}/{{$item->server_time_in}}</div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-4 col-sm-4">Device Date/Time In</div>
                                          <div class="col-md-1 col-sm-1">:</div>
                                          <div class="col-md-7 col-sm-7">{{$item->device_date_in}}/{{$item->device_time_in}} 
                                            @if ($M>=5 AND $jam>0)
                                            <span class="right badge badge-danger">+{{$jam}}h{{$M}}m</span>&nbsp;
                                            @endif
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-4 col-sm-4">Location In</div>
                                          <div class="col-md-1 col-sm-1">:</div>
                                          <div class="col-md-7 col-sm-7"><a href="https://www.google.com/maps/search/{{$item->loc_in}}" target="_blank">{{$item->loc_in}}</a></div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-4 col-sm-4">Server Date/Time Out</div>
                                          <div class="col-md-1 col-sm-1">:</div>
                                          <div class="col-md-7 col-sm-7">{{$item->server_date_out}}/{{$item->server_time_out}}</div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-4 col-sm-4">Device Date/Time Out</div>
                                          <div class="col-md-1 col-sm-1">:</div>
                                          <div class="col-md-7 col-sm-7">{{$item->device_date_out}}/{{$item->device_time_out}}
                                            @if ($M2>=5 AND $jam2>0)
                                            <span class="right badge badge-danger">+{{$jam2}}h{{$M2}}m</span>&nbsp;
                                            @endif
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-4 col-sm-4">Location Out</div>
                                          <div class="col-md-1 col-sm-1">:</div>
                                          <div class="col-md-7 col-sm-7"><a href="https://www.google.com/maps/search/{{$item->loc_out}}" target="_blank">{{$item->loc_out}}</a></div>
                                        </div>
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