@extends('template.template')
@section('isi')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add New Employee
      </h1>
    </section>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#jenisterapi').on('change', function(e){
                var id = e.target.value;
                var idd = $('#idd').val(); 
                $('#idat').val(id+idd);
            });
        });
    </script>

    <!-- Main content -->
    <section class="content">

      <!-- row -->
      <div class="row">
        <div class="col-xs-12">
          <!-- jQuery Knob -->
          <div class="box box-solid">

            <!-- begin data alat-->
            
                <form class="form-horizontal" action="" method="">
                  
                  <div class="box-body">
                    <div class="row">
                      <div class="col-xs-7 col-md-12 text-left">
                          <div class="form-group">
                            <label class="col-sm-12"><h3>Input Data Employee</h3><hr></label>
                          </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-xs-7 col-md-8 text-center">
                          <div class="form-group">
                            <label class="col-sm-4 control-label" style="text-align: left; padding-left: 40pt">Department Group ID</label>

                            <div class="col-sm-7">
                              <select class="form-control select2" name="jenisterapi " id="jenisterapi" onchange="readURL(this);">
                                <option selected hidden>Choose Department</option>
                                <option value="">Technical</option>
                              </select>
                            </div>
                          </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-xs-7 col-md-8 text-center">
                          <div class="form-group">
                            <label class="col-sm-4 control-label" style="text-align: left; padding-left: 40pt">ID</label>
                            <div class="col-sm-7">
                               <input type="text" name="idd" id="idd" value="" hidden="true">
                               <input type="text" class="form-control" name="idat" id="idat" value="" readonly>
                            </div>
                          </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-xs-7 col-md-8 text-center">
                          <div class="form-group">
                            <label class="col-sm-4 control-label" style="text-align: left; padding-left: 40pt">Department Name</label>

                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="namaat" value="" required>
                            </div>
                          </div>
                      </div>
                    </div>     

                    <div class="button">
                      <ul class="left" style="padding-left: 385pt ">
                        <button class="btn btn-success" href="#">Save</button>
                        <button class="btn btn-secondary" href="#">Cancel</button>
                      </ul>
                    </div>
                  </div>
                </form>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

    <script type="text/javascript">
      $(document).ready(function() {
          $('.js-example-basic-multiple').select2();
      });
    </script>
  </div>

@endsection
