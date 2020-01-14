<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Kehadiran_Karyawan_{{$first}}-{{$end}}.xls");
    ?>
    <table>
        <thead>
            <tr>
                <th colspan="12">Aktivitas Karyawan {{$first}}-{{$end}}</th>    
            </tr>
        <tr>
          <th>No.</th>
          <th>Name</th>
          <th>Date In</th>
          <th>Time In</th>
          <th>Location In</th>
          <th>Date Out</th>
          <th>Time Out</th>
          <th>Location Out</th>
          <th>Customer</th>
          <th>Customer Site</th>
          <th>Job Activity</th>
          <th>subject</th>
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
          <td>{{$item->device_date_in}}</td>
          <td>{{$item->device_time_in}}</td>
          <td>{{$item->loc_in}}</td>
          <td>{{$item->device_date_out}}</td>
          <td>{{$item->device_time_out}}</td>
          <td>{{$item->loc_out}}</td>
          <td>{{$item->customerSite->customer->cust_name}}</td>
          <td>{{$item->customerSite->customer_site}}</td>
          <td>{{$item->jobActivity->jenis_kegiatan}}</td>
          <td></td>
        </tr>
      @endforeach
        </tbody>
      </table>
      <br><br><br>
      <table>
        <thead>
            <tr>
                <th colspan="12">Total Aktivitas Karyawan {{$first}}-{{$end}}</th>    
            </tr>
        <tr>
          <th>No.</th>
          <th>Name</th>
          <th>Total Aktivitas</th>
        </tr>
        </thead>
        <tbody>
          @php
              $no=0;
          @endphp
        @foreach ($pegawai as $m)
        @php
         $no++;   
        @endphp
        <tr>
            <td>{{$no}}.</td>
            <td>{{$m->nama}}</td>
            <td>{{$hadir["$m->id"]}}</td>
        </tr>
        @endforeach
        </tbody>
      </table>
      
</body>
</html>