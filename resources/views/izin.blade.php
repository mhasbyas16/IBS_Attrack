<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Attendance</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
         <div class="col-lg-3"></div>
          <div class="col-lg-6">
            <div class="card card-primary card-outline">
              <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1><b>Leaves</b></h1>
                    </div>
                </div>
                <div class="card">
                    @if (\Session::has('alert'))
                        <div class="card-body">
                            <div class="alert alert-danger text-middle alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-key"></i> Alert!</h5>
                                {{Session::get('alert')}}
                            </div>
                        </div>
                    @endif
                    @if (\Session::has('Salert'))
                        <div class="card-body">
                            <div class="alert alert-success text-middle alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h5><i class="icon fas fa-key"></i> Success!</h5>
                                {{Session::get('Salert')}}
                            </div>
                        </div>
                    @endif
                    <div class="card-body login-card-body">
                        <form action="{{route('izin.store')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col-sm-12 col-md-12">
                            <select name="pegawai" class="form-control">
                            @foreach ($peg as $item)
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                            @endforeach
                            </select>
                          </div>
                        </div><br>
                        <div class="row">
                          <div class="col-sm-12 col-md-12">
                            <select name="type" class="form-control">
                              @foreach ($type as $i)
                                  <option value="{{$i->id}}">{{$i->type}}</option>
                              @endforeach
                              </select>
                          </div>
                        </div>
                    </div>
                    <!-- /.login-card-body -->
                  </div>

                  <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                      <label for="#text">Reason :</label>
                      <textarea name="alasan" class="form-control" id="text"></textarea>
                  </div><br><br>
                  
                </div>  
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                      <label for="#photo">Upload Photo :</label>
                      <input type="file" name="Uphoto" id="photo" class="form-control" accept="image/*;capture=camera">
                        <hr size="2px" style="width: 500px;">
                    </div>
                </div>
               
                <div class="row text-center">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <input type="submit" class="btn btn-success" name="save" value="Save">&nbsp;
                        <a href="{{route("login.index")}}" class="btn btn-danger">Back</a>
                    </div>
                </div>
            </form>
                
              </div>
            </div><!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('template.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
</body>
<script>/*
$(function(){
    setInterval(timestamp, 1000);//fungsi yang dijalan setiap detik, 1000 = 1 detik
});
function timestamp() {
    $.ajax({
        method: 'GET',
        url: '{{url("/time")}}',
        success: function(data) {
        $('#timestamp').html(data);
        },
    });
}

var view = document.getElementById("tampilkan");

$(function(){
    getLocation();
    setInterval(getLocation, 10000);
});
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        view.innerHTML = "Yah browsernya ngga support Geolocation bro!";
    }
}
 function showPosition(position) {
    view.innerHTML = position.coords.latitude + "," + position.coords.longitude;
 }

//CEK

$('body').on('keyup','#nip', function(e){
    e.preventDefault();
    var nip=$(this).val();
    var loc=$('#tampilkan').val();
    $.ajax({
        method: 'POST',
        url: '{{url("/inout2")}}',
        data: {
          '_token': '{{ csrf_token() }}',
          'nip': nip,
          'loc': loc
        },
        success: function(c){
            console.log(c);
            if (c.data== null) {
                $('#in').attr('disabled',false);
                $('#out').attr('disabled',true);
                $('#idabsensi').val("");
            }else{
                if (c.data.cek=="checkin" || c.data.cek=="") {
                    $('#in').attr('disabled',true);
                    $('#out').attr('disabled',false);
                    $('#idabsensi').val(c.data.id);    
                }else if(c.data.cek=="checkout"){
                    $('#in').attr('disabled',false);
                    $('#out').attr('disabled',true);
                    $('#idabsensi').val("");
                }
            } 
        },
        statusCode:{
            500: function(v){
              console.log(v);
                
            }
        }
    });
});
*/
</script>
</html>
