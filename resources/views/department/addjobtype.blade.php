@extends('template.template')
@section('isi')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Job Type's Data</h1>
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
                  Job Type's List
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <!-- jQuery Knob -->
                    <div class="box box-solid">

                          <form class="form-horizontal" action="{{route('JobType.store')}}" method="post">
                            {{ csrf_field() }}
                            <div class="box-body">

                              <div class="row col-md-12">
                                <label class="col-md-12"><h4>Input Job Type</h4><hr></label>
                              </div>
                              <div class="row col-md-12 mt-2">
                                <label class="col-sm-3 control-label" style="text-align: left; padding-left: 20pt">Department Group Name</label>
                                <div class="col-sm-5">
                                  <div class="col-sm-9">
                                    <select class="form-control" id="IDKelDept" required>
                                      <option value="" hidden>-- Select One ---</option>
                                      @foreach ($data as $ii)
                                      <option value="{{$ii->id}}">{{$ii->nama}}</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="row col-md-12 mt-2">
                                <label class="col-sm-3 control-label" style="text-align: left; padding-left: 20pt">Department Name</label>
                                <div class="col-sm-5">
                                  <div class="col-sm-9">
                                    <select class="form-control" id="DeptNama" name="IdDept" required>
                                      <option value="">-- Select Group Department ---</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="row col-md-12 mt-2">
                                <label class="col-sm-3 control-label" style="text-align: left; padding-left: 20pt">Job Activity</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="job" id="Job" required>
                                </div>
                              </div>
                            </div>
                            <div class="row mt-4 col-md-12">
                              <ul class="text-right col-md-8" style="padding-right: 10px">
                                <button class="btn btn-success" href="#">Save</button>
                                <input type="button" class="btn btn-secondary" id="x3" onclick="clear2()" value="Cancel">
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
                <div class="row mt-4 mb-4 ml-4">
                  <div class="col-xs-12">
                      <!-- jQuery Knob -->
                    <div class="box box-solid">
                        <!-- begin data alat-->
                      <form class="form-horizontal">
                        <div class="box-body">
                          <table id="pegawais" class="table table-bordered table-striped">
                            <thead>
                            <tr class="text-center">
                              <th>No</th>
                              <th>Department Group Name</th>
                              <th>Department Name</th>
                              <th>Job Activity</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($data as $p)
                            @foreach ($p->jabatans as $d)
                    
                            <tr>
                              <td class="text-center">{{$no}}</td>
                              <td>{{$p->nama}}</td>
                              <td>{{$d->nama}}</td>
                              <td>
                                <table>
                                @foreach ($d->jobActivities as $ti)
                                <tr id="id_job_{{$ti->id}}">
                                  <td>- {{$ti->jenis_kegiatan}}</td>
                                  <td>
                                    <a href="javascript:void(0)" id="JobTypeDel" data-id="{{$ti->id}}" class="btn btn-danger btn-sm">Delete</a>
                                  </td>
                                </tr>
                                @endforeach
                                </table>
                                </td> 
                            </tr>
                            @php
                                $no++;
                            @endphp   
                            @endforeach
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr class="text-center">
                              <th>No</th>
                              <th>Department Group Name</th>
                              <th>Department Name</th>
                              <th>Job Activity</th>
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