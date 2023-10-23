@extends('superadmin.layouts.app')
@push('css')
    
@endpush
@section('content-header')
PEGAWAI
@endsection
@section('content')
<div class="row">
  <div class="col-xs-12">
    <a href="/superadmin/data/pegawai/add" class="btn btn-sm bg-purple"><i class="fa fa-user-plus"></i> Tambah</a>
    <a href="/superadmin/data/pegawai/sync" class="btn btn-sm bg-purple"><i class="fa fa-refresh"></i> Tarik Data Pegawai Dari TPP</a> 
    <a href="/superadmin/data/pegawai/akun" class="btn btn-sm bg-purple"><i class="fa fa-key"></i> Buat Akun Pegawai</a> 
    
    <br/><br/>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-clipboard"></i> Data Pegawai</h3>

        <div class="box-tools">
          <div class="input-group input-group-sm hidden-xs" style="width: 250px;">
            <input type="text" name="table_search" class="form-control pull-right" placeholder="Cari NIP/Nama/Jabatan/Jenjang">

            <div class="input-group-btn">
              <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive table-bordered table-condensed">
        <table class="table table-hover">
          <tbody>
          <tr style="background-color: #a8c4f1">
            <th class="text-center">No</th>
            <th>#</th>
            <th>NIP</th>
            <th>NAMA</th>
            <th>UNIT KERJA</th>
            <th>Aksi</th>
          </tr>
          @foreach ($data as $key => $item)
          <tr>
              <td class="text-center">{{$data->firstItem() + $key}}</td>
              <td></td>
              <td>{{$item->nip}}</td>
              <td>{{$item->nama}}</td>
            <td>{{$item->unitkerja == null ? '': $item->unitkerja->nama}}</td>
              <td>                  
                <a href="/superadmin/data/pegawai/profile/{{$item->id}}" class="btn btn-xs btn-flat  btn-success"><i class="fa fa-user"></i> profile </a>
                  <a href="/superadmin/data/pegawai/edit/{{$item->id}}" class="btn btn-xs btn-flat  btn-success"><i class="fa fa-edit"></i></a>
                  <a href="/superadmin/data/pegawai/delete/{{$item->id}}"
                      onclick="return confirm('Yakin ingin di hapus');"
                      class="btn btn-xs btn-flat  btn-danger"><i class="fa fa-trash"></i></a>
                      @if ($item->user != null)
                          
    <a href="/superadmin/data/pegawai/resetpass/{{$item->id}}" class="btn btn-xs bg-purple"><i class="fa fa-lock"></i> Reset Password</a>
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
