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
                <div class="row">
                  <div class="col-xs-12">
                      <!-- jQuery Knob -->
                    <div class="box box-solid">
                        <!-- begin data alat-->
                      <form class="form-horizontal">
                        <div class="box-body">
                          <table id="pegawais" width="100%" class="table table-bordered table-striped text-center">
                            <thead>
                            <tr>
                              <th>No.</th>
                              <th>Name</th>
                              <th>Date In</th>
                              <th>Time In</th>
                              <th>Location In</th>
                              <th>Date Out</th>
                              <th>Time Out</th>
                              <th>Location Out</th>
                              <th>subject</th>
                              <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                          @php
                              $no=1;
                          @endphp
                          @foreach ($absensi as $item)
                            @foreach ($item->pegawai as $i)
                            @php
                                $awal  = strtotime($item->device_time_in); //waktu awal
                                $akhir = strtotime($item->server_time_in); //waktu akhir
                                $diff  = $akhir - $awal;
                                $jam   = floor($diff / (60 * 60));
                                $menit = $diff - $jam * (60 * 60);
                                $M     = floor( $menit/60);
                            @endphp
                            <tr>
                              <td>{{$no}}</td>
                              <td>{{$i->nama}}</td>
                              <td>{{$item->device_date_in}}</td>
                              <td>{{$item->device_time_in}}</td>
                              <td>{{$item->loc_in}}</td>
                              <td>{{$item->device_date_out}}</td>
                              <td>{{$item->device_time_out}}</td>
                              <td>{{$item->loc_out}}</td>
                              <td>
                                @if ($M>=5)
                                <span class="right badge badge-danger">+$M</span>
                                @endif
                              </td>
                              <td>Action</td>
                            </tr>
                            @php
                                $no++;
                            @endphp
                            @endforeach
                          @endforeach
                            
                            </tbody>
                            <tfoot>
                            <tr>
                              <th>No.</th>
                              <th>Name</th>
                              <th>Date In</th>
                              <th>Time In</th>
                              <th>Location In</th>
                              <th>Date Out</th>
                              <th>Time Out</th>
                              <th>Location Out</th>
                              <th>subject</th>
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