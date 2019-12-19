@extends('template.template')
@section('isi')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customer Site's Data</h1>
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
                  Customer Site's List
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <!-- jQuery Knob -->
                    <div class="box box-solid">

                      <!-- begin data alat-->
                      
                          <form class="form-horizontal" action="{{route('customerSite.store')}}" method="post">
                            {{ csrf_field() }}
                            <div class="box-body">
                              <div class="row">
                                <div class="col-xs-7 col-md-12 text-left">
                                    <div class="form-group">
                                      <label class="col-sm-12"><h4>Input Customer Site</h4><hr></label>
                                    </div>
                                </div>
                              </div>
                              <input type="hidden" class="form-control" name="id" id="CUSTS">
                              <div class="row col-md-12 mt-2">
                                <label class="col-sm-3 control-label" style="text-align: left; padding-left: 40pt">Customer Name</label>
                                <div class="col-sm-5">
                                    <select class="form-control select2" name="cust" id="Custs" onchange="readURL(this);">
                                      @foreach ($cust as $item)
                                      <option value="{{$item->id}}">{{$item->cust_name}}</option>
                                      @endforeach
                                    </select>
                                </div>
                              </div>

                              <div class="row col-md-12 mt-2">
                                <label class="col-sm-3 control-label" style="text-align: left; padding-left: 40pt">Customer Site Name</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="name" id="Name" required>
                                </div>
                              </div>

                              <div class="row col-md-12 mt-2">
                                <label class="col-sm-3 control-label" style="text-align: left; padding-left: 40pt">Person in Charge</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="pic" id="PIC" required>
                                </div>
                              </div>

                              <div class="row col-md-12 mt-2">
                                <label class="col-sm-3 control-label" style="text-align: left; padding-left: 40pt">Phone Number</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="phone" id="Phone" required>
                                </div>
                              </div>
                              <br>
                              <div class="row col-md-12">
                                <label class="col-sm-3 control-label" style="text-align: left; padding-left: 40pt">Address</label>
                                <div class="col-sm-5">
                                    <textarea type="text" class="form-control" name="address" id="Address" required></textarea>
                                </div>
                              </div>

                              <div class="row mt-4">
                                <ul class="text-right col-md-8" style="padding-right: 13pt ">
                                  <button class="btn btn-success" href="#">Save</button>
                                  <a class="btn btn-secondary" href="javascript:void(0)" id="Cancelcust">Cancel</a>
                                </ul>
                              </div>
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
                          <table id="pegawais" class="table table-bordered table-striped text-center">
                            <thead>
                            <tr>
                              <th>No.</th>
                              <th>Customer</th>
                              <th>Customer Site</th>
                              <th>Personal In Charge</th>
                              <th>Phone Number</th>
                              <th>Address</th>
                              <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($cust as $m)
                            @foreach ($m->customerSites as $e)
                            <tr id="id_site_{{$e->id}}">
                              <td>{{$no}}</td>
                              <td>{{$m->cust_name}}</td>
                              <td>{{$e->customer_site}}</td>
                              <td>{{$e->pic}}</td>
                              <td>{{$e->phone}}</td>
                              <td>{{$e->address}}</td>
                              <td>
                                <a href="javascript:void(0)" id="editCustSite" data-id="{{$e->id}}" class="btn btn-social-icon btn-success">
                                  <i class="fa fa-edit"></i></a>
                                <a href="javascript:void(0)" id="deleteCustSite" data-id="{{$e->id}}" class="btn btn-social-icon btn-danger">
                                  <i class="fa fa-trash"></i></a>
                              </td>
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
                              <th>Customer</th>
                              <th>Customer Site</th>
                              <th>Personal In Charge</th>
                              <th>Phone Number</th>
                              <th>Address</th>
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