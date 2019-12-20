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
                <div class="row">
                  <div class="col-xs-12">
                      <!-- jQuery Knob -->
                    <div class="box box-solid">
                        <!-- begin data alat-->
                      <form class="form-horizontal">
                        <div class="box-body">
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
                            <tbody>
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
                                <a href="#Info" class="btn btn-social-icon btn-info" data-toggle="modal" data-target="#modal-lg-{{$no}}">
                                  <i class="fa fa-info-circle"></i></a>
                              </td>
                            </tr>

                            <!--MODAL-->
                            <div class="modal fade" id="modal-lg-{{$no}}">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Large Modal</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="col-md-4 col-sm-4">
                                        <img src="{{$item->foto}}" style="width:150px;" height="" alt="foto">
                                      </div>
                                      <div class="col-md-8 col-sm-8">
                                        <div class="row">
                                          <div class="col-md-4 col-sm-4">Nama</div>
                                          <div class="col-md-1 col-sm-1">:</div>
                                          <div class="col-md-7 col-sm-7">{{$item->pegawai->nama}}</div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-4 col-sm-4">Date/Time In</div>
                                          <div class="col-md-1 col-sm-1">:</div>
                                          <div class="col-md-7 col-sm-7">{{$item->device_date_in}}/{{$item->device_time_in}}</div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-4 col-sm-4">Location In</div>
                                          <div class="col-md-1 col-sm-1">:</div>
                                          <div class="col-md-7 col-sm-7"><a href="https://www.google.com/maps/search/{{$item->loc_in}}" target="_blank">{{$item->loc_in}}</a></div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-4 col-sm-4">Date/Time Out</div>
                                          <div class="col-md-1 col-sm-1">:</div>
                                          <div class="col-md-7 col-sm-7">{{$item->device_date_out}}/{{$item->device_time_out}}</div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-4 col-sm-4">Location Out</div>
                                          <div class="col-md-1 col-sm-1">:</div>
                                          <div class="col-md-7 col-sm-7"><a href="https://www.google.com/maps/search/{{$item->loc_out}}" target="_blank">{{$item->loc_out}}</a></div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                          <div class="col-md-4 col-sm-4">Customer Name</div>
                                          <div class="col-md-1 col-sm-1">:</div>
                                          <div class="col-md-7 col-sm-7">{{$item->customerSite->customer->cust_name}}</div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-4 col-sm-4">Customer Site</div>
                                          <div class="col-md-1 col-sm-1">:</div>
                                          <div class="col-md-7 col-sm-7">{{$item->customerSite->customer_site}}</div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-4 col-sm-4">Job Activity</div>
                                          <div class="col-md-1 col-sm-1">:</div>
                                          <div class="col-md-7 col-sm-7">{{$item->jobActivity->jenis_kegiatan}}</div>
                                        </div>
                                        <div class="row">
                                          <div class="col-md-4 col-sm-4">Customer Address</div>
                                          <div class="col-md-1 col-sm-1">:</div>
                                          <div class="col-md-7 col-sm-7">{{$item->customerSite->address}}</div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                          <div class="col-md-4 col-sm-4">Deskripsi</div>
                                          <div class="col-md-1 col-sm-1">:</div>
                                          <div class="col-md-7 col-sm-7">{{$item->deskripsi}}</div>
                                        </div>
                                      </div>                                    
                                    </div>
                                  </div>
                                  <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
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