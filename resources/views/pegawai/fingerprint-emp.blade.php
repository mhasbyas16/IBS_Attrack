@extends('template.template')
@section('isi')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Employee</h1>
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
                  New Employee
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <!-- jQuery Knob -->
                    <div class="box box-solid">
                          <form class="form-horizontal" action="{{--route('employee.store',['type'=>'add'])--}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="box-body">

                              <div class="row col-md-12">
                                <label class="col-md-12"><h4>Input Fingerprint Employee</h4><hr></label>
                              </div>
                              <div class="row col-md-12 mt-2">
                                <label class="col-sm-3 control-label" style="text-align: left; padding-left: 20pt">Name</label>
                                <div class="col-sm-5">
                                  <select name="nama" id="namaSelect" class="form-control select2" style="width: 100%;" value="" required>
                                    <option value="" hidden>--- Select One ---</option>
                                    @foreach ($emp as $item)
                                      <option value="{{$item->id}}">{{$item->nama}}</option>    
                                    @endforeach  
                                  </select>
                                </div>
                              </div>
                              <div class="row col-md-12 mt-2">
                                <label class="col-sm-3 control-label" style="text-align: left; padding-left: 20pt">NIP</label>
                                <div class="col-sm-5">
                                  <input type="text" class="form-control" name="nip" id="nip" value="12" readonly>
                                </div>
                              </div>
                              <div class="row col-md-12 mt-2">
                                <label class="col-sm-3 control-label" style="text-align: left; padding-left: 20pt">Confirm 1</label>
                                <div class="col-sm-5">
                                  <input type="text" class="form-control" name="confirm1" required="" autofocus>
                                </div>
                              </div>
                              <div class="row col-md-12 mt-2">
                                <label class="col-sm-3 control-label" style="text-align: left; padding-left: 20pt">Confirm 2</label>
                                <div class="col-sm-5">
                                  <input type="text" class="form-control" name="confirm2" required="">
                                </div>
                              </div>
                              <div class="row col-md-12 mt-2">
                                <label class="col-sm-3 control-label" style="text-align: left; padding-left: 20pt">Confirm 3</label>
                                <div class="col-sm-5">
                                  <input type="text" class="form-control" name="confirm3" required="">
                                </div>
                              </div>
                              <div class="row col-md-12 mt-2">
                                <label class="col-sm-3 control-label" style="text-align: left; padding-left: 20pt">Confirm 4</label>
                                <div class="col-sm-5">
                                  <input type="text" class="form-control" name="confirm4" required="">
                                </div>
                              </div>
                              
                            </div>
                            <div class="row mt-4 col-md-12">
                              <ul class="text-right col-md-8" style="padding-right: 10px">
                                <button class="btn btn-success" href="#">Save</button>
                                <input type="reset" class="btn btn-danger" value="Cancel">
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
  
</script>
</body>
</html>

@endsection