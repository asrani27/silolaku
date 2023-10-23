@extends('superadmin.layouts.app')
@push('css')
    
@endpush
@section('content-header')
DASHBOARD
@endsection
@section('content')
<div class="row">
  <div class="col-md-4 col-sm-6 col-xs-12">
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
  
  <div class="col-md-4 col-sm-6 col-xs-12">
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
  
  <div class="col-md-4 col-sm-6 col-xs-12">
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
</div>

<div class="row">
  <div class="col-md-8">
    <div class="box">
    <div class="box-body">
      {{-- <div id="chartContainer" style="height: 500px; width: 100%;"></div> --}}
    </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="box">
    <div class="box-body">
      
    </div>
    </div>
  </div>
  
</div>

@endsection
@push('js')
<script src="https://cdn.canvasjs.com/ga/canvasjs.min.js"></script>
<script>
  window.onload = function () {
    
  var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    
    title:{
      text:"Penghasilan Puskesmas Bulan ini"
    },
    axisX:{
      interval: 1
    },
    axisY2:{
      includeZero: true,
		scaleBreaks: {
			type: "wavy",
			customBreaks: [{
				startValue: 80,
				endValue: 210
				},
				{
					startValue: 230,
					endValue: 600
				}
		]}
	},
    data: [{
      type: "bar",
      name: "puskesmas",
      toolTipContent: "<img src=\"https://canvasjs.com/wp-content/uploads/images/gallery/javascript-column-bar-charts/\"{url}\"\" style=\"width:40px; height:20px;\"> <b>{label}</b><br>Budget: ${y}bn<br>{gdp}% of GDP",
      dataPoints: [
        { y: 3, label: "Sweden" },
        { y: 7, label: "Taiwan" },
        { y: 5, label: "Russia" },
        { y: 9, label: "Spain" },
        { y: 7, label: "Brazil" },
        { y: 7, label: "India" },
        { y: 9, label: "Italy" },
        { y: 8, label: "Australia" },
        { y: 11, label: "Canada" },
        { y: 15, label: "South Korea" },
        { y: 12, label: "Netherlands" },
        { y: 15, label: "Switzerland" },
        { y: 25, label: "Britain" },
        { y: 28, label: "Germany" },
        { y: 29, label: "France" },
        { y: 52, label: "Japan" },
        { y: 103, label: "China" },
        { y: 120.000, label: "US" }
      ]
    }]
  });
  chart.render();
  
  }
  </script>
@endpush
