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

                      @if (Route::is('employee.show'))
                      <form class="form-horizontal" action="{{route('employee.store',['type'=>'edit'])}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="box-body">

                          <input type="hidden" class="form-control" name="id" value="{{$realID}}" required>
                          <div class="row col-md-12">
                            <label class="col-md-12"><h4>Input Data Employee</h4><hr></label>
                          </div>
                          <div class="row col-md-12 mt-2">
                            <label class="col-sm-3 control-label" style="text-align: left; padding-left: 20pt">NIP</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" name="nip" value="{{$pegawai->nip}}" required>
                            </div>
                          </div>
                          <div class="row col-md-12 mt-2">
                            <label class="col-sm-3 control-label" style="text-align: left; padding-left: 20pt">Name</label>
                            <div class="col-sm-5">
                              <input type="text" class="form-control" name="nama" value="{{$pegawai->nama}}" required>
                            </div>
                          </div>
                          <div class="row col-md-12 mt-2">
                            <label class="col-sm-3 control-label" style="text-align: left; padding-left: 20pt">Email</label>
                            <div class="col-sm-5">
                              <input type="email" class="form-control" name="email" value="{{$pegawai->email}}" required>
                            </div>
                          </div>
                          <div class="row col-md-12 mt-2">
                            <label class="col-sm-3 control-label" style="text-align: left; padding-left: 20pt">Jenis Kelamin</label>
                            <div class="col-sm-5">
                              <select name="jk" class="form-control" value="" required>
                                <option value="{{$pegawai->gender}}" selected hidden>
                                  @if ($pegawai->gender=='lk')
                                      Laki-Laki
                                  @elseif ($pegawai->gender=='pr')
                                      Perempuan
                                  @endif</option>
                                <option value="lk">Laki-Laki</option>
                                <option value="pr">Perempuan</option>
                              </select>
                            </div>
                          </div>
                          <div class="row col-md-12 mt-2">
                            <label class="col-sm-3 control-label" style="text-align: left; padding-left: 20pt">Jabatan</label>
                            <div class="col-sm-5">
                              <select name="jabatan" class="form-control" value="" required>
                                <option value="{{$pegawai->jabatan_id}}" selected hidden>{{$pegawai->jabatan->nama}}</option>
                                @foreach ($jabatan as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="row col-md-12 mt-2">
                            <label class="col-sm-3 control-label" style="text-align: left; padding-left: 20pt">Alamat</label>
                            <div class="col-sm-5">
                              <textarea class="form-control" name="alamat" required>{{$pegawai->address}}</textarea>
                            </div>
                          </div>
                          <div class="row col-md-12 mt-2">
                            <label class="col-sm-3 control-label" style="text-align: left; padding-left: 20pt">Status</label>
                            <div class="col-sm-5">
                                <select name="status" value="" class="form-control" required>
                                  <option value="{{$pegawai->status}}" selected hidden >
                                  @if ($pegawai->status==1)
                                      Out Office
                                  @else
                                      In Office
                                  @endif</option>
                                  <option value="1">Out Office</option>
                                  <option value="0">In Office</option>
                                </select>
                            </div>
                          </div>
                        </div>
                        <div class="row mt-4 col-md-12">
                          <ul class="text-right col-md-8" style="padding-right: 10px">
                            <a href="{{route('employee.reset',['id'=>$realID])}}" class="btn btn-info">Reset Password</a>
                          </ul>
                        </div>
                        <div class="row mt-4 col-md-12">
                          <ul class="text-right col-md-8" style="padding-right: 10px">
                            <button type="submit" class="btn btn-success">Edit</button>
                            <a href="{{route('employee.index')}}" class="btn btn-danger">Cancel</a>
                          </ul>
                        </div>
                      </form>
                      @elseif (Route::is("employeeAdd.index"))
                          <form class="form-horizontal" action="{{route('employee.store',['type'=>'add'])}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="box-body">

                              <div class="row col-md-12">
                                <label class="col-md-12"><h4>Input Data Employee</h4><hr></label>
                              </div>
                              <div class="row col-md-12 mt-2">
                                <label class="col-sm-3 control-label" style="text-align: left; padding-left: 20pt">NIP</label>
                                <div class="col-sm-5">
                                  <input type="text" class="form-control" name="nip" id="nip" required="">
                                </div>
                              </div>
                              <div class="row col-md-12 mt-2">
                                <label class="col-sm-3 control-label" style="text-align: left; padding-left: 20pt">Name</label>
                                <div class="col-sm-5">
                                  <input type="text" class="form-control" name="nama" id="nama" required="">
                                </div>
                              </div>
                              <div class="row col-md-12 mt-2">
                                <label class="col-sm-3 control-label" style="text-align: left; padding-left: 20pt">Email</label>
                                <div class="col-sm-5">
                                  <input type="email" class="form-control" name="email" required="">
                                </div>
                              </div>
                              <div class="row col-md-12 mt-2">
                                <label class="col-sm-3 control-label" style="text-align: left; padding-left: 20pt">Jenis Kelamin</label>
                                <div class="col-sm-5">
                                  <select name="jk" class="form-control" value="" required>
                                    <option value="lk">Laki-Laki</option>
                                    <option value="pr">Perempuan</option>
                                  </select>
                                </div>
                              </div>
                              <div class="row col-md-12 mt-2">
                                <label class="col-sm-3 control-label" style="text-align: left; padding-left: 20pt">Jabatan</label>
                                <div class="col-sm-5">
                                  <select name="jabatan" class="form-control" value="" required>
                                    <option value="" hidden disabled>--- select one ---</option>
                                    @foreach ($jabatan as $item)
                                        <option value="{{$item->id}}">{{$item->nama}}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                              <div class="row col-md-12 mt-2">
                                <label class="col-sm-3 control-label" style="text-align: left; padding-left: 20pt">Alamat</label>
                                <div class="col-sm-5">
                                  <textarea class="form-control" name="alamat" id="alamat" required="">  </textarea>
                                </div>
                              </div>
                              <div class="row col-md-12 mt-2">
                                <label class="col-sm-3 control-label" style="text-align: left; padding-left: 20pt">Status</label>
                                <div class="col-sm-5">
                                    <select name="status" value="" class="form-control" required>
                                      <option value="" selected hidden disabled >--- Select One ---</option>
                                      <option value="1">Out Office</option>
                                      <option value="0">In Office</option>
                                    </select>
                                </div>
                              </div>
                              <div class="row col-md-12 mt-2">
                                <label class="col-sm-3 control-label" style="text-align: left; padding-left: 20pt">Password</label>
                                <div class="col-sm-5">
                                  <input type="password" class="form-control" name="password" id="password" required="">
                                </div>
                              </div>
                              <div class="row col-md-12 mt-2">
                                <label class="col-sm-3 control-label" style="text-align: left; padding-left: 20pt">Confirm Password</label>
                                <div class="col-sm-5">
                                  <input type="password" class="form-control" name="confirm_password" id="password2" required="">
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
                        @endif
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