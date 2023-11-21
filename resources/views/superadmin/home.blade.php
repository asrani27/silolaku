@extends('superadmin.layouts.app')
@push('css')
    
@endpush
@section('content-header')
DASHBOARD
@endsection
@section('content')
<div class="row">
  <div class="col-md-3 col-sm-3 col-xs-12">
    <div class="info-box bg-blue-gradient">
      <span class="info-box-icon"><i class="fa fa-university"></i></span>
  
      <div class="info-box-content">
        <span class="info-box-text">UNIT KERJA</span>
        <span class="info-box-number">28</span>
  
        <div class="progress">
          <div class="progress-bar" style="width: 100%"></div>
        </div>
        <span class="progress-description">
             Total Unit Kerja
            </span>
      </div>
    </div>
  </div>
  
  <div class="col-md-3 col-sm-3 col-xs-12">
    <div class="info-box bg-purple-gradient">
      <span class="info-box-icon"><i class="fa fa-money"></i></span>
  
      <div class="info-box-content">
        <span class="info-box-text">PENGHASILAN BULAN INI</span>
        <span class="info-box-number">Rp.</span>
  
        <div class="progress">
          <div class="progress-bar" style="width: 100%"></div>
        </div>
        <span class="progress-description">
             Total Penghasilan Bulan Ini
            </span>
      </div>
    </div>
  </div>
  
  <div class="col-md-3 col-sm-3 col-xs-12">
    <div class="info-box bg-red-gradient">
      <span class="info-box-icon"><i class="fa fa-money"></i></span>
  
      <div class="info-box-content">
        <span class="info-box-text">PENGHASILAN BULAN SEBELUMNYA</span>
        <span class="info-box-number">Rp. </span>
  
        <div class="progress">
          <div class="progress-bar" style="width: 100%"></div>
        </div>
        <span class="progress-description">
             Total Penghasilan Bulan Sebelumnya
            </span>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-3 col-xs-12">
    <div class="info-box bg-green-gradient">
      <span class="info-box-icon"><i class="fa fa-money"></i></span>
  
      <div class="info-box-content">
        <span class="info-box-text">TAHUN</span>
        <span class="info-box-number">{{\Carbon\Carbon::now()->format('Y')}} </span>
  
        <div class="progress">
          <div class="progress-bar" style="width: 100%"></div>
        </div>
        <span class="progress-description">
             Total Penghasilan Bulan Sebelumnya
            </span>
      </div>
    </div>
  </div>
</div>

@foreach ($hasil as $key => $item)
    
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-clipboard"></i> Grafik {{namaBulan($item['month'])}} {{$item['year']}}</h3>
        <div class="box-tools">
        </div>
      </div>
      <div class="box-body">
        <div id="chartContainer{{$item['month']}}" style="height: 700px; width: 100%;"></div>
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection
@push('js')
<script src="https://cdn.canvasjs.com/ga/canvasjs.min.js"></script>
<script>
  function namaBulan($bulan)
{
    if ($bulan == '01') {
        $nama_bulan = 'Januari';
    }
    if ($bulan == '02') {
        $nama_bulan = 'Februari';
    }
    if ($bulan == '03') {
        $nama_bulan = 'Maret';
    }
    if ($bulan == '04') {
        $nama_bulan = 'April';
    }
    if ($bulan == '05') {
        $nama_bulan = 'Mei';
    }
    if ($bulan == '06') {
        $nama_bulan = 'Juni';
    }
    if ($bulan == '07') {
        $nama_bulan = 'Juli';
    }
    if ($bulan == '08') {
        $nama_bulan = 'Agustus';
    }
    if ($bulan == '09') {
        $nama_bulan = 'September';
    }
    if ($bulan == '10') {
        $nama_bulan = 'Oktober';
    }
    if ($bulan == '11') {
        $nama_bulan = 'November';
    }
    if ($bulan == '12') {
        $nama_bulan = 'Desember';
    }
    return $nama_bulan;
}


  window.onload = function () {
  var unitkerja = {!!json_encode($hasil)!!}
  
  
  unitkerja.forEach(element => {

      var dataPuskesmas = element.unitkerja
      //console.log(dataPuskesmas);
      var dataPoints = dataPuskesmas.map((d)=>{
          return {
            y:Number(Number(d.penghasilan).toFixed(2)),
            label:d.nama,
          }
      })
      const total = Number(dataPoints.reduce((current, value) => current += value.y, 0).toFixed(2))
      //console.log({total});
      var chart = new CanvasJS.Chart("chartContainer"+element.month, {
        animationEnabled: true,
        title: {
          text: "Penghasilan Puskesmas Bulan : "+ namaBulan(element.month) +" "+ element.year+", Rp., "+ total,
          fontSize:20,
        },
        axisX:{
          interval: 0.2,
          labelFontSize: 10
        },
        
        axisY2:{
          interlacedColor: "rgba(1,77,101,.2)",
          gridColor: "rgba(1,77,101,.1)",
          //title: 
          
          labelFontSize:10,
        },
        data: [{
          type: "bar",
          name: "companies",
          axisYType: "secondary",
          color: "#014D65",
          dataPoints: dataPoints
        }]
      });

      chart.render();
    });
  }
</script>
@endpush
