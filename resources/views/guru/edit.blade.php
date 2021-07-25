@extends('layouts.app')

@section('title', 'Halaman Edit Data Guru')

@section('content')
<div class="content-row">
  <h2 class="content-row-title">Form Edit Data Guru</h2>
  <a href="{{ url('guru') }}" class="btn btn-sm btn-danger tombol"><i class="fa fa-arrow-left"></i>Kembali</a>

  <div class="panel panel-default">
  <hr>
    <div class="panel-body">

      <form role="form" action="{{ url('guru/' . $guru->id . '/update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="nama_guru">Nama Guru</label>
              <input type="text" name="nama_guru" class="form-control" id="nama_guru" value="{{ $guru->nama_guru }}">
              @if($errors->has('nama_guru'))
              <small class="text-danger">
                <strong>{{ $errors->first('nama_guru') }}</strong>
              </small>
              @endif
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" name="email" class="form-control" id="email" value="{{ $guru->email }}">
              @if($errors->has('email'))
              <small class="text-danger">
                <strong>{{ $errors->first('email') }}</strong>
              </small>
              @endif
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="jenis_kelamin">Pilih Jenis Kelamin</label>
              <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                <option value="Laki-Laki" @if($guru->jenis_kelamin == 'Laki-Laki') selected @endif>Laki - Laki</option>
                <option value="Perempuan" @if($guru->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
              </select>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="agama">Pilih Agama</label>
              <select class="form-control" id="agama" name="agama">
                <option value="Islam" @if($guru->agama == 'Islam') selected @endif>Islam</option>
                <option value="Kristen" @if($guru->agama == 'Kristen') selected @endif>Kristen</option>
                <option value="Katolik" @if($guru->agama == 'Katolik') selected @endif>Katolik</option>
                <option value="Hindu" @if($guru->agama == 'Hindu') selected @endif>Hindu</option>
                <option value="Buddha" @if($guru->agama == 'Budhha') selected @endif>Buddha</option>
              </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="gambar">File input</label>
              <input type="file" id="gambar" name="gambar">
              <p class="help-block">Upload File Berjenis: JPG, JPEG, GIF, PNG dan Dengan Maximal Ukuran 3 Mb.</p>
              @if($errors->has('gambar'))
              <small class="text-danger">
                <strong>{{ $errors->first('gambar') }}</strong>
              </small>
            @endif
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="nomor_telepon">Nomor Telepon</label>
              <input type="text" name="nomor_telepon" class="form-control" id="nomor_telepon" value="{{ $guru->nomor_telepon }}">
              @if($errors->has('nomor_telepon'))
              <small class="text-danger">
                <strong>{{ $errors->first('nomor_telepon') }}</strong>
              </small>
            @endif
            </div>
          </div>
        </div>

        <div class="panel panel-default" style="text-align: center;">
          <div class="panel-heading">Foto Anda</div>
          <div class="panel-body">
            <img src="{{ $guru->getAvatar() }}" class="img-responsive img-thumbnail center-block" height="50%" width="50%" alt="Responsive image">
            <p><b>Upload Foto Baru Jika Anda Ingin Merubah Foto</b></p>
          </div>
        </div>

        <div class="form-group">
          <label for="alamat_lengkap">Alamat Lengkap</label>
            <textarea class="form-control" rows="10" cols="30" id="alamat_lengkap" name="alamat_lengkap">{{ $guru->alamat_lengkap }}</textarea>
            @if($errors->has('alamat_lengkap'))
              <small class="text-danger">
                <strong>{{ $errors->first('alamat_lengkap') }}</strong>
              </small>
            @endif
        </div>
        
        <button type="submit" class="btn btn-success">Ubah Data</button>

      </form>

    </div>
  </div>
</div>
@stop