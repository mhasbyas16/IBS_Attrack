@extends('template.template')
@section('isi')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard Administrator</h1>
          </div><!-- /.col -->
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div> --><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<!-- /.content-header -->

<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-tasks"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Manajemen</span>
                <span class="info-box-number">
                  {{$manajemen}}
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-coins"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Finance and Accounting</span>
                <span class="info-box-number">{{$finance}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sales and Marketing</span>
                <span class="info-box-number">{{$sales}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-cogs"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Technical</span>
                <span class="info-box-number">{{$technical}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Operation Support And Service</span>
                <span class="info-box-number">{{$operation}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Daily Record</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card-body">
                      <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#attendance" role="tab" aria-controls="custom-content-below-home" aria-selected="true">Attendance</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#activity" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">Activity</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="custom-content-below-messages-tab" data-toggle="pill" href="#leaves" role="tab" aria-controls="custom-content-below-messages" aria-selected="false">Leaves</a>
                        </li>
                      </ul>
                      <div class="tab-content" id="custom-content-below-tabContent">
                        <div class="tab-pane fade show active" id="attendance" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                          
                          <div class="box-body">
                            <br>
                            <div class="row">
                              <div class="table-responsive">
                                <table id="Att" class="table table-bordered table-striped text-center dt-responsive display nowrap" style="width:100%">
                                  <thead>
                                    <tr>
                                      <th>No.</th>
                                      <th>Name</th>
                                      <th>Date In</th>
                                      <th>Location In</th>
                                      <th>Date Out</th>
                                      <th>Location Out</th>
                                      <th>subject</th>
                                      <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="isiTB">
                                  @php
                                      $no=0;
                                  @endphp
                                  @foreach ($absensi as $item)
                                    @php
                                        $no++;
                                    @endphp
                                    <tr>
                                      <td>{{$no}}.</td>
                                      <td>{{$item->pegawai->nama}}</td>
                                      <td>{{$item->device_date_in}} {{$item->device_time_in}}</td>
                                      <td><a href="https://www.google.com/maps/search/{{$item->loc_in}}" class="btn btn-info" target="_blank">Check</a></td>
                                      <td>{{$item->device_date_out}} {{$item->device_time_out}}</td>
                                      <td><a href="https://www.google.com/maps/search/{{$item->loc_out}}" class="btn btn-info" target="_blank">Check</a></td>
                                      <td> 
                                        @if ($item->status=="telat")
                                        <span class="right badge badge-danger">Telat</span>
                                        @endif
        
                                      </td>
                                      <td style="width:50px;">
                                        <a href="{{route('attendance.detail',['id'=>$item->id,'N'=>$first,'X'=>$end])}}" class="btn btn-social-icon btn-info">
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
                                      <th>subject</th>
                                      <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                              </div>
                            </div>
                          </div>
                           
                        </div>
                        <div class="tab-pane fade" id="activity" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
                          
                          <div class="box-body">
                            <br>
                            <div class="row">
                              <div class="table-responsive">
                                <table id="Act" class="table table-bordered table-striped text-center dt-responsive display nowrap" style="width:100%">
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
                                      <td><a href="https://www.google.com/maps/search/{{$item->loc_in}}" class="btn btn-info" target="_blank">Check</a></td>
                                      <td>{{$item->device_date_out}} {{$item->device_time_out}}</td>
                                      <td><a href="https://www.google.com/maps/search/{{$item->loc_out}}" class="btn btn-info" target="_blank">Check</a></td>
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
                            </div>
                          </div>

                        </div>
                        <div class="tab-pane fade" id="leaves" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">
                          
                          <div class="box-body">
                            <br>
                          <div class="row">
                            <div class="table-responsive">
                              <table id="Leave" class="table table-bordered table-striped text-center dt-responsive display nowrap" style="width:100%">
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
                          </div>
                          </div>

                        </div>
                      </div>
                    </div>
                    <!-- /.card -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Monthly Recap Report</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <p class="text-center">
                      <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                    </p>

                    <div class="chart">
                      <!-- Sales Chart Canvas -->
                      <canvas id="salesChart" height="180" style="height: 180px;"></canvas>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <p class="text-center">
                      <strong>Progress</strong>
                    </p>

                    <div class="progress-group">
                      Attendance's Level
                      <span class="float-right"><b>160</b>/200</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width: 80%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->

                    <div class="progress-group">
                      Total of Sales's Activities
                      <span class="float-right"><b>310</b>/400</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" style="width: 75%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Total of Technical's Activities</span>
                      <span class="float-right"><b>480</b>/800</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-success" style="width: 60%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      Total of Operational's Activities
                      <span class="float-right"><b>250</b>/500</span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" style="width: 50%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 50%</span>
                      <h5 class="description-header">25 Records</h5>
                      <span class="description-text">Attendance's Level Prev Month</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 80%</span>
                      <h5 class="description-header">40 Records</h5>
                      <span class="description-text">Attendance's Level This Month</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 100</span>
                      <h5 class="description-header">15 Employees</h5>
                      <span class="description-text">Total Activities</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block">
                      <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 6</span>
                      <h5 class="description-header">6 Employees</h5>
                      <span class="description-text">Total Employees</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
<!-- /.content -->
  </div>

@endsection