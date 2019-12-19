@extends('template.template')
@section('isi')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customer's Data</h1>
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
                  Customer's List
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <!-- jQuery Knob -->
                    <div class="box box-solid">

                      <!-- begin data alat-->
                      
                          <form class="form-horizontal" action="{{route('customer.store')}}" method="post">
                            {{ csrf_field() }}
                            <div class="box-body col-md-12">

                              <div class="row col-md-12">
                                <label class="col-md-12"><h4>Input Customer</h4><hr style="width:100;"></label>                            
                              </div>

                              <input type="hidden" class="form-control" name="id" id="CUST">
                              <br>
                              <div class="row col-md-12">
                                <label class="col-sm-3 control-label" style="text-align: left; padding-left: 40pt">Customer Name</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="cust_name" id="CustName" value="">
                                </div>
                              </div>
                              <br> 

                              <div class="row mt-4">
                                <ul class="text-right col-md-8" style="padding-right: 10pt ">
                                  <button class="btn btn-success" href="#">Save</button>
                                  <a class="btn btn-secondary" href="javascript:void(0)" id="custCancel">Cancel</a>
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
                              <th>Customer Name</th>
                              <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $no=1;
                            @endphp
                            @foreach ($cust as $item)
                            <tr id="id_cust_{{$item->id}}">
                              <td>{{$no}}</td>
                              <td>{{$item->cust_name}}</td>
                              <td>
                                <a href="javascript:void(0)" id="editCust" data-id="{{$item->id}}" class="btn btn-social-icon btn-success">
                                  <i class="fa fa-edit"></i></a>
                                <a href="javascript:void(0)" id="deleteCust" data-id="{{$item->id}}" class="btn btn-social-icon btn-danger">
                                  <i class="fa fa-trash"></i></a>
                              </td>
                            </tr>
                            @php
                                $no++;
                            @endphp
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                              <th>No.</th>
                              <th>Customer Name</th>
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
<script type="text/javascript">
 $(document).ready( function () {
    $('#pegawais').DataTable(); 
} );
</script>
</body>
</html>

@endsection