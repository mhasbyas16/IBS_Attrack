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
                <th colspan="13"><b>Kehadiran Karyawan {{$first}}-{{$end}}</b></th>    
            </tr>
        <tr>
          <th>No.</th>
          <th>Name</th>
          <th>Server Date In</th>
          <th>Server Time In</th>
          <th>Device Date In</th>
          <th>Device Time In</th>
          <th>Location In</th>
          <th>Server Date Out</th>
          <th>Server Time Out</th>
          <th>Device Date Out</th>
          <th>Device Time Out</th>
          <th>Location Out</th>
          <th>subject</th>
        </tr>
        </thead>
        <tbody>
      @php
          $no=0;
      @endphp
      @foreach ($absensi as $item)
        @php
            $no++;
            $awal  = strtotime("".$item->server_date_in." ".$item->server_time_in.""); //waktu awal
            $akhir = strtotime("".$item->device_date_in." ".$item->device_time_in.""); //waktu akhir
            $diff  = $akhir - $awal;
            $jam   = floor($diff / (60 * 60));
            $menit = $diff - $jam * (60 * 60);
            $M     = floor( $menit/60);

            $awal2  = strtotime("".$item->server_date_out." ".$item->server_time_out.""); //waktu awal
            $akhir2 = strtotime("".$item->device_date_out." ".$item->device_time_out.""); //waktu akhir
            $diff2  = $akhir2 - $awal2;
            $jam2   = floor($diff2 / (60 * 60));
            $menit2 = $diff2 - $jam2 * (60 * 60);
            $M2     = floor( $menit2/60);
        @endphp
        <tr>
          <td>{{$no}}.</td>
          <td>{{$item->pegawai->nama}}</td>
          <td>{{$item->server_date_in}}</td>
          <td>{{$item->server_time_in}}</td>
          <td>{{$item->device_date_in}}</td>
          <td>{{$item->device_time_in}}
            @if ($M>=5 AND $jam>0)
            &nbsp;(+{{$jam}}h{{$M}}m)
            @endif  
          </td>
          <td>{{$item->loc_in}}</td>
          <td>{{$item->server_date_out}}</td>
          <td>{{$item->server_time_out}}</td>
          <td>{{$item->device_date_out}}</td>
          <td>{{$item->device_time_out}}
            @if ($M2>=5 AND $jam2>0)
            &nbsp;(+{{$jam2}}h{{$M2}}m)
            @endif  
          </td>
          <td>{{$item->loc_out}}</td>
          <td>             
            @if ($item->status=="telat")
            Telat
            @endif
          </td>
        </tr>
      @endforeach
        </tbody>
      </table>

      <br><br><br>
      <table>
        <thead>
            <tr>
                <th colspan="13"><b>Izin Karyawan {{$first}}-{{$end}}</b></th>    
            </tr>
        <tr>
          <th>No.</th>
          <th>Name</th>
          <th>Date</th>
          <th>Type</th>
          <th>Reason</th>
        </tr>
        </thead>
        <tbody>
          @php
              $no=0;
          @endphp
        @foreach ($leave as $leaveVAL)
        @php
         $no++;   
        @endphp
        <tr>
            <td>{{$no}}.</td>
            <td>{{$leaveVAL->pegawai->nama}}</td>
            <td>{{$leaveVAL->date}}</td>
            <td>{{$leaveVAL->leaveType->type}}</td>
            <td>{{$leaveVAL->reason}}</td>
        </tr>
        @endforeach
        </tbody>
      </table>

      <br><br><br>
      <table>
        <thead>
            <tr>
                <th colspan="13"><b>Total Kehadiran Karyawan {{$first}}-{{$end}}</b></th>    
            </tr>
        <tr>
          <th>No.</th>
          <th>Name</th>
          <th>hadir</th>
          <th>Telat</th>
          <th>Izin</th>
          <th>Total kehadiran</th>
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
            <td>{{$telat["$m->id"]}}</td>
            <td>{{$izin["$m->id"]}}</td>
            <td>{{$hadir["$m->id"]+$telat["$m->id"]+$izin["$m->id"]}}</td>
        </tr>
        @endforeach
        </tbody>
      </table>
      
</body>
</html>