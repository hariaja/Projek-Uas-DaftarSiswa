@extends('layouts.app')

@section('title', 'Halaman Edit Data Siswa')

@section('content')
<div class="content-row">
  <h2 class="content-row-title">Form Edit Data Siswa</h2>

  @if (auth()->user()->level == 'Admin')
    <a href="{{ url('siswa') }}" class="btn btn-sm btn-danger tombol"><i class="fa fa-arrow-left"></i>Kembali</a>

  @elseif (auth()->user()->level == 'Guru')
    <a href="{{ url('siswa') }}" class="btn btn-sm btn-danger tombol"><i class="fa fa-arrow-left"></i>Kembali</a>

  @else
    <a href="{{ url('lihat/' . $siswa->id . '/profile-siswa') }}" class="btn btn-sm btn-danger tombol"><i class="fa fa-arrow-left"></i>Kembali</a>
  @endif

  <div class="panel panel-default">
  <hr>
    <div class="panel-body">
      <form role="form" action="{{ url('siswa/' . $siswa->id . '/update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="nama_siswa">Nama Siswa</label>
              <input type="text" name="nama_siswa" class="form-control" id="nama_siswa" value="{{ $siswa->nama_siswa }}">
              @if($errors->has('nama_siswa'))
              <small class="text-danger">
                <strong>{{ $errors->first('nama_siswa') }}</strong>
              </small>
              @endif
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" name="email" class="form-control" id="email" value="{{ $siswa->email }}">
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
              <label for="tempat_lahir">Tempat Lahir</label>
              <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" value="{{ $siswa->tempat_lahir }}">
              @if($errors->has('tempat_lahir'))
              <small class="text-danger">
                <strong>{{ $errors->first('tempat_lahir') }}</strong>
              </small>
              @endif
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="tanggal_lahir">Tanggal Lahir</label>
              <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" value="{{ $siswa->tanggal_lahir }}">
              @if($errors->has('tanggal_lahir'))
              <small class="text-danger">
                <strong>{{ $errors->first('tanggal_lahir') }}</strong>
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
                <option value="Laki-Laki" @if($siswa->jenis_kelamin == 'Laki-Laki') selected @endif>Laki - Laki</option>
                <option value="Perempuan" @if($siswa->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
              </select>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="agama">Pilih Agama</label>
              <select class="form-control" id="agama" name="agama">
                <option value="Islam" @if($siswa->agama == 'Islam') selected @endif>Islam</option>
                <option value="Kristen" @if($siswa->agama == 'Kristen') selected @endif>Kristen</option>
                <option value="Katolik" @if($siswa->agama == 'Katolik') selected @endif>Katolik</option>
                <option value="Hindu" @if($siswa->agama == 'Hindu') selected @endif>Hindu</option>
                <option value="Buddha" @if($siswa->agama == 'Budhha') selected @endif>Buddha</option>
              </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="nama_wali">Nama Wali</label>
              <input type="text" name="nama_wali" class="form-control" id="nama_wali" value="{{ $siswa->nama_wali }}">
              @if($errors->has('nama_wali'))
              <small class="text-danger">
                <strong>{{ $errors->first('nama_wali') }}</strong>
              </small>
            @endif
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="nomor_telepon">Nomor Telepon</label>
              <input type="text" name="nomor_telepon" class="form-control" id="nomor_telepon" value="{{ $siswa->nomor_telepon }}">
              @if($errors->has('nomor_telepon'))
              <small class="text-danger">
                <strong>{{ $errors->first('nomor_telepon') }}</strong>
              </small>
            @endif
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
              <label for="kelas_id">Pilih Kelas</label>
              <select class="form-control" id="kelas_id" name="kelas_id">
                @if ($kelas)
                @foreach ($kelas as $kls)
                    <option value="{{ $kls->id }}"
                      {{ $siswa->kelas_id == $kls->id ? 'selected' : '' }}>{{ $kls->nama_kelas }}</option>
                  @endforeach
                @endif
              </select>
            </div>
          </div>
        </div>

        <div class="panel panel-default" style="text-align: center;">
          <div class="panel-heading">Foto Anda</div>
          <div class="panel-body">
            <img src="{{ $siswa->getPhoto() }}" class="img-responsive img-thumbnail center-block" height="50%" width="50%" alt="Responsive image">
            <p><b>Upload Foto Baru Jika Anda Ingin Merubah Foto</b></p>
          </div>
        </div>

        <div class="form-group">
          <label for="alamat_lengkap">Alamat Lengkap</label>
            <textarea class="form-control" rows="10" cols="30" placeholder="Masukan Alamat Lengkap" id="alamat_lengkap" name="alamat_lengkap">{{ $siswa->alamat_lengkap }}</textarea>
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