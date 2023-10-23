@extends('layouts.app')
@push('css')
    
@endpush
@section('content')
<section class="content-header">
  <h1>EDIT DATA</h1>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#kependudukan" data-toggle="tab">Kependudukan</a></li>
        </ul>
        <div class="tab-content">
            
          <div class="active tab-pane" id="kependudukan">
            <form class="form-horizontal" method="post" action="/pegawai/biodata/edit/kependudukan" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label text-right">NIK</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="nik" required value="{{$data->nik}}">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Agama</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="agama" required>
                      <option value="">-pilih-</option>
                      <option value="ISLAM" {{$data->agama == 'ISLAM' ? 'selected':''}}>ISLAM</option>
                      <option value="PROTESTAN" {{$data->agama == 'PROTESTAN' ? 'selected':''}}>PROTESTAN</option>
                      <option value="KATOLIk" {{$data->agama == 'KATOLIk' ? 'selected':''}}>KATOLIk</option>
                      <option value="HINDU" {{$data->agama == 'HINDU' ? 'selected':''}}>HINDU</option>
                      <option value="BUDDHA" {{$data->agama == 'BUDDHA' ? 'selected':''}}>BUDDHA</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Kewarganegaraan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="kewarganegaraan" required value="{{$data->kewarganegaraan}}">
                  </div>
                </div>

                @if (Auth::user()->pegawai->file_kk == null)
                <div class="form-group">
                  <label class="col-sm-2 control-label">Upload KTP (PDF, Maks 2MB)</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="file_ktp" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Upload KK (PDF, Maks 2MB)</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="file_kk" required>
                  </div>
                </div>
                @else
                <div class="form-group">
                  <label class="col-sm-2 control-label">Upload KTP (PDF, Maks 2MB)</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="file_ktp">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Upload KK (PDF, Maks 2MB)</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="file_kk">
                  </div>
                </div>
                @endif

                <div class="form-group">
                  <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-block bg-purple"><i class="fa fa-save"></i> SIMPAN</button>
                    <a href="/pegawai/beranda" class="btn btn-block btn-danger"><i class="fa fa-arrow-left"></i> KEMBALI</a>
                  </div>
                </div>
            </form>
          </div>
          
        </div>
        <!-- /.tab-content -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
</div>
</section>


@endsection
@push('js')

@endpush
