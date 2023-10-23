@extends('superadmin.layouts.app')
@push('css')
    
@endpush
@section('content-header')
UNIT KERJA
@endsection
@section('content')
<div class="row">
  <div class="col-xs-12">
    <a href="/superadmin/data/unitkerja/add" class="btn btn-sm btn-primary" style="border-radius: 25px;box-shadow: 2px 2px #888888;"><i class="fa fa-user-plus"></i> Tambah</a>&nbsp;&nbsp;
    <a href="/superadmin/data/unitkerja/kode" class="btn btn-sm btn-primary" style="border-radius: 25px;box-shadow: 2px 2px #888888;"><i class="fa fa-refresh"></i> &nbsp;&nbsp;Generate Kode</a>&nbsp;&nbsp;
    <a href="/superadmin/data/unitkerja/akun" class="btn btn-sm btn-primary" style="border-radius: 25px;box-shadow: 2px 2px #888888;"><i class="fa fa-lock"></i>&nbsp;&nbsp; Buat Akun </a> <br/><br/>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-clipboard"></i> Data Pegawai</h3>

        <div class="box-tools">
          {{-- <a href="/superadmin/akun/add" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-plus-circle"></i> Tambah Akun</a> --}}
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive table-bordered table-condensed">
        <table class="table table-hover">
          <tbody>
          <tr style="background-color: rgb(161, 227, 247)">
            <th class="text-center">No</th>
            <th>KODE/USERNAME</th>
            <th>NAMA</th>
            <th>Aksi</th>
          </tr>
          @foreach ($data as $key => $item)
          <tr>
              <td class="text-center">{{$data->firstItem() + $key}}</td>
              <td>{{$item->kode}}</td>
              <td>{{$item->nama}}</td>
              <td>                  
                {{-- <a href="/superadmin/data/unitkerja/profile/{{$item->id}}" class="btn btn-xs btn-flat  btn-success"><i class="fa fa-user"></i> profile </a> --}}
                  <a href="/superadmin/data/unitkerja/edit/{{$item->id}}" class="btn btn-xs btn-flat  btn-success"  style="border-radius: 25px;box-shadow: 2px 2px #888888;"><i class="fa fa-edit"></i> Edit</a>
                  <a href="/superadmin/data/unitkerja/delete/{{$item->id}}"
                      onclick="return confirm('Yakin ingin di hapus');"
                      class="btn btn-xs btn-flat  btn-danger" style="border-radius: 25px;box-shadow: 2px 2px #888888;"><i class="fa fa-trash"></i> Delete</a>
                      @if ($item->user != null)
                          
    <a href="/superadmin/data/unitkerja/resetpass/{{$item->id}}" class="btn btn-xs bg-purple" style="border-radius: 25px;box-shadow: 2px 2px #888888;"><i class="fa fa-lock"></i> Reset Password</a>
                      @endif
              </td>
          </tr>
          @endforeach
          
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
    {{$data->links()}}
  </div>
</div>
@endsection
@push('js')
<script src="https://cdn.canvasjs.com/ga/canvasjs.min.js"></script>

<script>
  window.onload = function() {
  
  var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    
    data: [{
      type: "pie",
      startAngle: 240,
      yValueFormatString: "##0.00\"%\"",
      indexLabel: "{label} {y}",
      dataPoints: [
        {y: 79.45, label: "SMA"},
        {y: 7.31, label: "D3"},
        {y: 7.06, label: "S1"},
        {y: 4.91, label: "S2"},
        {y: 1.26, label: "S3"}
      ]
    }]
  });

  var chart2 = new CanvasJS.Chart("chartContainer2", {
    animationEnabled: true,
    
    data: [{
      type: "pie",
      startAngle: 240,
			legendText: "{indexLabel}",
      dataPoints: [
        {y: 7.45, label: "Gol. I"},
        {y: 7.31, label: "Gol. II"},
        {y: 70.06, label: "Gol. III"},
        {y: 40.91, label: "Gol. V"},
        {y: 10.26, label: "Gol. V"}
      ]
    }]
  });
  var chart3 = new CanvasJS.Chart("chartContainer3", {
    animationEnabled: true,
    
    data: [{
      type: "pie",
      startAngle: 240,
			legendText: "{indexLabel}",
      dataPoints: [
        {y: 2134, label: "Laki-Laki"},
        {y: 1567, label: "Perempuan"},
      ]
    }]
  });
  var chart4 = new CanvasJS.Chart("chartContainer4", {
    animationEnabled: true,
    
    data: [{
      type: "pie",
      startAngle: 240,
			legendText: "{indexLabel}",
      dataPoints: [
        {y: 2134, label: "PNS"},
        {y: 1567, label: "PKKK"},
        {y: 2602, label: "NON ASN"},
      ]
    }]
  });
  chart.render();
  chart2.render();
  chart3.render(); 
  chart4.render();  
  }
</script>
@endpush
