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
                <form id="SearchLeaves" enctype="multipart/form-data">
                  {{ csrf_field() }}
                <div class="row">
                  <div class="col-sm-3 col-md-3">
                    <input type="date" class="form-control float-right" name="min" id="min" value="{{$first}}">
                      
                  </div>
                  <div class="col-sm-1 col-md-1">
                   <b> <hr> </b>
                  </div>
                  <div class="col-sm-3 col-md-3">
                       <input type="date" class="form-control float-right" name="max" id="max" value="{{$end}}">
                  </div>
                  <div class="col-sm-2 col-md-2">
                    <button type="submit" class="btn btn-default" id="searchLeaves"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </form><br><br>
                <div class="row">
                  <div class="col-xs-12">
                      <!-- jQuery Knob -->
                    <div class="box box-solid">
                        <!-- begin data alat-->
                      <form class="form-horizontal">
                        <div class="box-body">
                          <table id="pegawais" style='width:100%;' class="table table-bordered table-striped text-center">
                            <thead>
                            <tr>
                              <th>No.</th>
                              <th>Name</th>
                              <th>Date</th>
                              <th>Type</th>
                              <th>Reason</th>
                              <th>Foto</th>
                            </tr>
                            </thead>
                            <tbody id="isiTB">
                            @php
                                $no=0;
                            @endphp
                            @foreach ($leave as $item)
                              @php
                                  $no++;
                              @endphp
                            <tr id="{{$no}}">
                              <td style="width:2%;">{{$no}}.</td>
                              <td style="width:20%;">{{$item->pegawai->nama}}</td>
                              <td style="width:20%;">{{$item->date}}</td>
                              <td style="width:15%;">{{$item->leaveType->type}}</td>
                              <td style="width:20%;">{{$item->reason}}</td>
                              <td style="width:23%;"><img src="{{$item->foto}}" style="height:100px;" alt=""></td>
                              <!--<td style='width:20%;'>
                                <a href="" id="yesValidate" data-id="" onclick="return confirm('Yakin ubah status menjadi diterima?')" class="btn btn-social-icon btn-success">
                                  <i class="fa fa-check"></i></a>&nbsp;&nbsp;
                                <a href="" id="noValidate" data-id="" onclick="return confirm('Yakin ubah status menjadi ditolak?')" class="btn btn-social-icon btn-danger">
                                  <i class="fa fa-times"></i></a>
                              </td>-->
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                              <th>No.</th>
                              <th>Name</th>
                              <th>Date</th>
                              <th>Type</th>
                              <th>Reason</th>
                              <th>Foto</th>
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