@extends('admin.layouts.app')
@push('css')
    
@endpush
@section('content-header')
GANTI PASSWORD
@endsection
@section('content')

<div class="row">
  <div class="col-xs-12">
    <a href="/admin/beranda" class="btn btn-sm bg-purple"><i class="fa fa-arrow-left"></i> Kembali</a>
    <br/><br/>
    <div class="box">
      <div class="box-header">
        <h3 class="box-title"><i class="fa fa-clipboard"></i> Ganti Password</h3>

        <div class="box-tools">
          {{-- <a href="/superadmin/akun/add" class="btn btn-sm btn-primary btn-flat "><i class="fa fa-plus-circle"></i> Tambah Akun</a> --}}
        </div>
      </div>
      <!-- /.box-header -->
      
      <form class="form-horizontal" action="/admin/gantipass" method="post">
        @csrf
        <div class="box-body">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Masukkan Password Lama</label>

            <div class="col-sm-10">
              <input type="emtextail" class="form-control" name="password_lama" placeholder="Password lama" required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Masukkan Password Baru</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="password_baru" placeholder="password baru" required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Masukkan Password Baru Lagi</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="confirm_password_baru" placeholder="confirm password baru" required>
            </div>
          </div>
          
          
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn bg-purple btn-block">Simpan</button>
        </div>
        <!-- /.box-footer -->
      </form>
      
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
    
  </div>
</div>
@endsection
@push('js')

@endpush
