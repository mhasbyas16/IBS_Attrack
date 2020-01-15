@extends('template.template')
@section('isi')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee's Activity</h1>
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
                <form id="SearchActivity" enctype="multipart/form-data">
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
                    <button type="submit" class="btn btn-default" id="searchAct"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </form>
              <br>
                <div class="row">
                  <div class="col-xs-12">
                      <!-- jQuery Knob -->
                    <div class="box box-solid">
                        <!-- begin data alat-->
                      <form class="form-horizontal">
                        <div class="box-body">
                          <a href="{{route('activity.export',['first'=>$first,'end'=>$end])}}" id="export" class="btn btn-primary">Export</a><br><br>

                          <table id="pegawais" class="table table-bordered table-striped text-center" style="width:100%;">
                            <thead>
                            <tr>
                              <th>No.</th>
                              <th>Name</th>
                              <th>Date In</th>
                              <th>Location In</th>
                              <th>Date Out</th>
                              <th>Location Out</th>
                              <th>Customer</th>
                              <th>Action</th>

                            </tr>
                            </thead>
                            <tbody id="isiTB">
                            @php
                                $no=0;
                            @endphp
                            @foreach ($aktivitas as $item)
                            @php
                                $no++;
                            @endphp                              
                            <tr>
                              <td>{{$no}}.</td>
                              <td>{{$item->pegawai->nama}}</td>
                              <td>{{$item->device_date_in}} {{$item->device_time_in}}</td>
                              <td><a href="https://www.google.com/maps/search/{{$item->loc_in}}" target="_blank">{{$item->loc_in}}</a></td>
                              <td>{{$item->device_date_out}} {{$item->device_time_out}}</td>
                              <td><a href="https://www.google.com/maps/search/{{$item->loc_out}}" target="_blank">{{$item->loc_out}}</a></td>
                              <td>{{$item->customerSite->customer->cust_name}}</td>
                              <td style="width:50px;">
                                <a href="{{route('activity.detail',['id'=>$item->id,'N'=>$first,'X'=>$end])}}" class="btn btn-social-icon btn-info">
                                  <i class="fa fa-info-circle"></i></a>
                              </td>
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                              <th>No.</th>
                              <th>Name</th>
                              <th>Date In</th>
                              <th>Location In</th>
                              <th>Date Out</th>
                              <th>Location Out</th>
                              <th>Customer</th>
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