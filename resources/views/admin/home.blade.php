@extends('admin.layouts.app')
@push('css')
    
@endpush
@section('content-header')
DASHBOARD ADMIN
@endsection
@section('content')
<div class="row">
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box bg-green-gradient">
      <span class="info-box-icon"><i class="fa fa-money"></i></span>
  
      <div class="info-box-content">
        <span class="info-box-text">PENGHASILAN HARI INI</span>
        <span class="info-box-number">{{number_format($penghasilanHariIni)}}</span>
  
        <div class="progress">
          <div class="progress-bar" style="width: 100%"></div>
        </div>
        <span class="progress-description">
             Total Penghasilan Hari Ini
            </span>
      </div>
    </div>
  </div>
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box bg-purple-gradient">
      <span class="info-box-icon"><i class="fa fa-money"></i></span>
  
      <div class="info-box-content">
        <span class="info-box-text">PENGHASILAN MINGGU INI</span>
        <span class="info-box-number">{{number_format($penghasilanMingguIni)}}</span>
  
        <div class="progress">
          <div class="progress-bar" style="width: 100%"></div>
        </div>
        <span class="progress-description">
             Total Penghasilan Minggu Ini
            </span>
      </div>
    </div>
  </div>
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box bg-red-gradient">
      <span class="info-box-icon"><i class="fa fa-money"></i></span>
  
      <div class="info-box-content">
        <span class="info-box-text">PENGHASILAN BULAN INI</span>
        <span class="info-box-number">{{number_format($penghasilanBulanIni)}}</span>
  
        <div class="progress">
          <div class="progress-bar" style="width: 100%"></div>
        </div>
        <span class="progress-description">
             Total Penghasilan Bulan Ini
            </span>
      </div>
    </div>
  </div>
  
</div>


<div class="row">
  <div class="col-xs-12">
    <a href="#" class="btn btn-primary btn-block margin-bottom penghasilan" style="border-radius: 25px;"><i class="fa fa-money"></i> INPUT PENGHASILAN</a>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Penghasilan Per Tanggal</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Aksi</th>
          </tr>
          </thead>
          <tbody>
            
            @foreach ($data as $item)
            <tr>
              <td><b>{{\Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y')}}</b></a></td>
              <td>Rp. {{number_format($item->nominal,2)}},-</td>
              <td>
                <a href="#" class="btn btn-xs btn-flat btn-success edit-penghasilan" data-id="{{$item->id}}" data-nominal="{{$item->nominal}}" data-tanggal="{{$item->tanggal}}"><i class="fa fa-edit"></i></a>
                <a href="/admin/penghasilan/delete/{{$item->id}}"
                    onclick="return confirm('Yakin ingin di hapus');"
                    class="btn btn-xs btn-flat  btn-danger"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Aksi</th>
          </tr>
          </tfoot>
        </table>
        {{$data->links()}}
      </div>
      <!-- /.box-body -->
    </div>
        
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>


<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Penghasilan Per Bulan</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Bulan</th>
            <th>Tahun</th>
            <th>Jumlah</th>
          </tr>
          </thead>
          <tbody>
            
            @foreach ($bulantahun as $item)
            <tr>
              <td><b>{{$item['namabulan']}}</b></td>
              <td><b>{{$item['year']}}</b></td>
              <td>Rp. {{number_format($item['penghasilan'],2)}},-</td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th>Tanggal</th>
            <th>Jumlah</th>
            <th>Aksi</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Penghasilan Per Tahun</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Tahun</th>
            <th>Jumlah</th>
          </tr>
          </thead>
          <tbody>
            
            @foreach ($tahunterakhir as $item)
            <tr>
              <td><b>{{$item['year']}}</b></td>
              <td>Rp. {{number_format($item['penghasilan'],2)}},-</td>
            </tr>
            @endforeach
          </tbody>
          <tfoot>
          <tr>
            <th>Tanggal</th>
            <th>Jumlah</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>


<div class="row">
  
  <div class="col-md-12">
    <div class="box box-primary">
      
      <!-- /.box-header -->
      <div class="box-body no-padding">
        
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
      </div>
      
    </div>
    <!-- /. box -->
  </div>
  <!-- /.col -->
</div>
<div class="modal fade" id="modal-penghasilan">
  <div class="modal-dialog">
      <div class="modal-content">
          <form role="form" method="post" action="/admin/penghasilan" enctype="multipart/form-data">
              @csrf
              
              <div class="modal-header" style="background-color:#37517e; color:white">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Penghasilan</h4>
              </div>

              <div class="modal-body">
                  <div class="form-group">
                  </div>
                  <div class="form-group">
                      <label>Tanggal</label>
                      <input type="date" class="form-control" name="tanggal" value="{{\Carbon\Carbon::now()->format('Y-m-d')}}" required>
                  </div>
                  <div class="form-group">
                      <label>Nominal</label>
                      <input type="text" class="form-control" name="nominal" onkeypress="return isNumberKey(event)"  required>
                  </div>
              </div>

              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary btn-block" style="border-radius: 25px;"><i class="fa fa-send"></i>Kirim</button>
              </div>
          </form>
      </div>
  </div>
</div>


<div class="modal fade" id="modal-edit-penghasilan">
  <div class="modal-dialog">
      <div class="modal-content">
          <form role="form" method="post" action="/admin/penghasilan/update" enctype="multipart/form-data">
              @csrf
              
              <div class="modal-header" style="background-color:#37517e; color:white">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Penghasilan</h4>
              </div>

              <div class="modal-body">
                  <div class="form-group">
                  </div>
                  <div class="form-group">
                      <label>Tanggal</label>
                      <input type="date" class="form-control" name="tanggal" id="tanggal" readonly>
                  </div>
                  <div class="form-group">
                      <label>Nominal</label>
                      <input type="text" class="form-control" id="nominal" name="nominal" onkeypress="return isNumberKey(event)"  required>
                  </div>
                      <input type="hidden" class="form-control" name="id_penghasilan" readonly id="id_penghasilan">
              </div>

              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary btn-block" style="border-radius: 25px;"><i class="fa fa-send"></i>Kirim</button>
              </div>
          </form>
      </div>
  </div>
</div>
@endsection
@push('js')
<script src="https://cdn.canvasjs.com/ga/canvasjs.min.js"></script>


<script>
  window.onload = function () {
    
      dataGrafik = {!!json_encode($grafik)!!}
      year = {!!json_encode($year)!!}
      

  var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    theme: "light2", // "light1", "light2", "dark1", "dark2"
    title:{
      text: "Tahun " + year
    },
    // axisY: {
    //   title: "Reserves(MMbbl)"
    // },
    data: [{        
      type: "column",  
      showInLegend: true, 
      dataPoints: dataGrafik
    }]
  });
  chart.render();
  
  }
  </script>


<script>
  $(document).on('click', '.penghasilan', function() {
    //$('#id_penghasilan').val($(this).data('id'));
     $("#modal-penghasilan").modal();
  });
  $(document).on('click', '.edit-penghasilan', function() {
     $('#id_penghasilan').val($(this).data('id'));
     $('#nominal').val($(this).data('nominal'));
     $('#tanggal').val($(this).data('tanggal'));
     $("#modal-edit-penghasilan").modal();
  });
</script>
<script>
 function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }
</script>
@endpush
