@extends('admin.layouts.app')
@push('css')
    
@endpush
@section('content-header')
DETAIL PEGAWAI
@endsection
@section('content')

<div class="row">
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">
          <img class="profile-user-img img-responsive img-circle" src="/assets/dist/img/user4-128x128.jpg" alt="User profile picture">

          <h3 class="profile-username text-center">{{$data->nama}}</h3>

          <p class="text-muted text-center">NIP. {{$data->nip}}</p>


          <a href="/admin/data/pegawai/" class="btn bg-purple btn-block"><b>Kembali</b></a>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
      
    </div>
    <!-- /.col -->
    <div class="col-md-9">


      <!-- Profile Diri -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Status Pegawai</h3>

          <div class="box-tools pull-right">
            {{-- <a href="/pegawai/biodata/edit/status" class="btn btn-xs bg-red-gradient"><i class="fa fa-edit"></i> Edit Status</a> --}}
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form class="form-horizontal">
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label text-right">Status Pegawai</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" readonly value="{{$data->status_pegawai}}">
              </div>
            </div>
        </form>
        </div>
      </div>

      <!-- Profile Diri -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Profil Diri</h3>

          <div class="box-tools pull-right">
            {{-- <a href="/pegawai/biodata/edit/profile" class="btn btn-xs bg-purple"><i class="fa fa-edit"></i> Edit Profil</a> --}}
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form class="form-horizontal">
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label text-right">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" readonly value="{{$data->nama}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">NIP</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" readonly value="{{$data->nip}}">
              </div>
            </div>
            @if ($data->status_pegawai == 'PNS' || $data->status_pegawai == 'PKKK')
                
            <div class="form-group">
              <label class="col-sm-2 control-label">Pangkat</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="{{$data->pangkat == null ? '': $data->pangkat->nama}}" readonly >
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Golongan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="{{$data->pangkat == null ? '': $data->pangkat->golongan}}" readonly >
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Jabatan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="{{$data->jabatan}}" readonly >
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Kelas Jabatan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="{{$data->kelas_jabatan}}" readonly >
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Jenis Jabatan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="{{$data->jenis_jabatan}}" readonly >
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Masa Kerja Golongan (Sesuai SK Pangkat Terakhir)</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="{{$data->mkg}}" readonly >
              </div>
            </div>
            @else
                
            <div class="form-group">
              <label class="col-sm-2 control-label">Jabatan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" readonly >
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Masa Kerja</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" readonly >
              </div>
            </div>
            @endif

            <div class="form-group">
              <label class="col-sm-2 control-label">Unit Kerja</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" readonly value="{{$data->unitkerja == null ? '': $data->unitkerja->nama}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Jenis Kelamin</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" readonly value="{{$data->jkel}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Tempat Lahir</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" readonly value="{{$data->tempat_lahir}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal Lahir</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" readonly value="{{$data->tanggal_lahir}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" readonly value="{{$data->email}}">
              </div>
            </div>  
        </form>
        </div>
      </div>

      <!-- Kependudukan -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Kependudukan</h3>

          <div class="box-tools pull-right">
            {{-- <a href="/pegawai/biodata/edit/kependudukan" class="btn btn-xs bg-aqua-gradient"><i class="fa fa-edit"></i> Edit Kependudukan</a> --}}
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form class="form-horizontal">
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label text-right">NIK</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" readonly value="{{$data->nik}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Agama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" readonly value="{{$data->agama}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Kewarganegaraan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" readonly value="{{$data->kewarganegaraan}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">File KTP dan KK</label>
              <div class="col-sm-10">
                <a href="/storage/{{$data->nip}}/kependudukan/{{$data->file_ktp}}" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-download"></i> Download KTP</a>
                <a href="/storage/{{$data->nip}}/kependudukan/{{$data->file_kk}}" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-download"></i> Download KK</a>
              </div>
            </div>
          </form>
        </div>
      </div>

      <!-- BPJS -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">BPJS</h3>

          <div class="box-tools pull-right">
            {{-- <a href="/pegawai/biodata/edit/bpjs" class="btn btn-xs bg-green-gradient"><i class="fa fa-edit"></i> Edit BPJS</a> --}}
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form class="form-horizontal">
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label text-right">No bpjs</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" readonly value="{{$data->no_bpjs}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Kelas</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" readonly value="{{$data->kelas_bpjs}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">File BPJS </label>
                <div class="col-sm-10">
                  <a href="/storage/{{$data->nip}}/bpjs/{{$data->file_bpjs}}" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-download"></i> Download BPJS</a>
                </div>
              </div>
          </form>
        </div>
      </div>

      <!-- PENDIDIKAN -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">PENDIDIKAN TERAKHIR</h3>

          <div class="box-tools pull-right">
            {{-- <a href="/pegawai/biodata/edit/pendidikan" class="btn btn-xs bg-yellow-gradient"><i class="fa fa-edit"></i> Edit Pendidikan</a> --}}
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form class="form-horizontal">
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label text-right">Jenjang</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" readonly value="{{$data->jenjang}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Gelar</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" readonly value="{{$data->gelar}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Prodi </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" readonly value="{{$data->prodi}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Tempat Pendidikan </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" readonly value="{{$data->tempat_pendidikan}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Tahun Lulus </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" readonly value="{{$data->tahun_lulus}}">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">File Ijazah & Transkrip </label>
                <div class="col-sm-10">
                  <a href="/storage/{{$data->nip}}/pendidikan/{{$data->file_ijazah}}" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-download"></i> Download Ijazah</a>
                  <a href="/storage/{{$data->nip}}/pendidikan/{{$data->file_transkrip}}" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-download"></i> Download Transkrip</a>
                </div>
              </div>
          </form>
        </div>
      </div>

      <!-- ALAMAT -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">ALAMAT TINGGAL SEKARANG</h3>

          <div class="box-tools pull-right">
            {{-- <a href="/pegawai/biodata/edit/alamat" class="btn btn-xs bg-red-gradient"><i class="fa fa-edit"></i> Edit Alamat</a> --}}
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form class="form-horizontal">
            <div class="form-group">
              <label class="col-sm-2 control-label">Provinsi </label>
              <div class="col-sm-10">
                <input id="provinsi" type="text" class="form-control" readonly value="{{$data->provinsi}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Kab/kota </label>
              <div class="col-sm-10">
                <input id="kota" type="text" class="form-control" readonly value="{{$data->kota}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Kecamatan </label>
              <div class="col-sm-10">
                <input id="kecamatan" type="text" class="form-control" readonly value="{{$data->kecamatan}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Kelurahan </label>
              <div class="col-sm-10">
                <input id="kelurahan" type="text" class="form-control" readonly value="{{$data->kelurahan}}">
              </div>
            </div>
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label text-right">Alamat</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" readonly value="{{$data->alamat}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">RT</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" readonly value="{{$data->rt}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">RW </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" readonly value="{{$data->rw}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Kode POs </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" readonly value="{{$data->kodepos}}">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">No Whatsapp Aktif </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" readonly value="{{$data->telp}}">
                </div>
              </div>
          </form>
        </div>
      </div>

      <!-- NPWP -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">NPWP</h3>

          <div class="box-tools pull-right">
            {{-- <a href="/pegawai/biodata/edit/npwp" class="btn btn-xs bg-blue-gradient"><i class="fa fa-edit"></i> Edit npwp</a> --}}
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form class="form-horizontal">
            <div class="form-group">
              <label class="col-sm-2 control-label">No NPWP </label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="no_npwp" readonly value="{{$data->no_npwp}}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">File BPJS </label>
              <div class="col-sm-10">
                <a href="/storage/{{$data->nip}}/npwp/{{$data->file_npwp}}" class="btn btn-primary btn-xs" target="_blank"><i class="fa fa-download"></i> Download NPWP</a>
              </div>
            </div>
          </form>
        </div>
      </div>

      <!-- NPWP -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">KEPEGAWAIAN</h3>

          <div class="box-tools pull-right">
            {{-- <a href="/pegawai/biodata/edit/kepegawaian" class="btn btn-xs bg-navy"><i class="fa fa-edit"></i> Edit Kepegawaian</a> --}}
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          
          @if ($data->status_pegawai == 'PNS')
              @include('admin.pegawai.sk.pns')
          @elseif ($data->status_pegawai == 'PKKK')
              @include('admin.pegawai.sk.pkkk')
          @elseif ($data->status_pegawai == 'NON ASN')
              @include('admin.pegawai.sk.nonasn')
          @else
              
          @endif

        </div>
      </div>
    </div>
    <!-- /.col -->
</div>
@endsection
@push('js')

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
$(document).ready(function(){
  
  data = {!!json_encode($data)!!}
  
  axios({
    method: 'get',
    url: 'https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json',
    responseType: 'stream'
  })
  .then(function (response) {
    for (var i = 0; i < JSON.parse(response.data).length; i++) 
    {
      if(JSON.parse(response.data)[i].id === data.provinsi){
        $("#provinsi").val(JSON.parse(response.data)[i].name);
      }
    }
  });

  axios({
    method: 'get',
    url: 'https://www.emsifa.com/api-wilayah-indonesia/api/regencies/'+data.provinsi+'.json',
    responseType: 'stream'
  })
  .then(function (response) {
    for (var i = 0; i < JSON.parse(response.data).length; i++) 
    {
      if(JSON.parse(response.data)[i].id === data.kota){
        $("#kota").val(JSON.parse(response.data)[i].name);
      }
    }
  });

  axios({
    method: 'get',
    url: 'https://www.emsifa.com/api-wilayah-indonesia/api/districts/'+data.kota+'.json',
    responseType: 'stream'
  })
  .then(function (response) {
    for (var i = 0; i < JSON.parse(response.data).length; i++) 
    {
      if(JSON.parse(response.data)[i].id === data.kecamatan){
        $("#kecamatan").val(JSON.parse(response.data)[i].name);
      }
    }
  });

  axios({
    method: 'get',
    url: 'https://www.emsifa.com/api-wilayah-indonesia/api/villages/'+data.kecamatan+'.json',
    responseType: 'stream'
  })
  .then(function (response) {
    for (var i = 0; i < JSON.parse(response.data).length; i++) 
    {
      if(JSON.parse(response.data)[i].id === data.kelurahan){
        $("#kelurahan").val(JSON.parse(response.data)[i].name);
      }
    }
  });
})
</script>

<script>
  $(document).on('click', '.ubahfoto', function() {
    //$('#step1').val($(this).data('id'));
     $("#modal-ubahfoto").modal();
  });
</script>
@endpush
