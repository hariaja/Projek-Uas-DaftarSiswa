@extends('layouts.app')

@section('title', 'Halaman Tambah Data Siswa')

@section('content')
<div class="content-row">
  <h2 class="content-row-title">Form Tambah Data Siswa</h2>
  <a href="{{ url('siswa') }}" class="btn btn-sm btn-danger tombol"><i class="fa fa-arrow-left"></i>Kembali</a>

  <div class="panel panel-default">
  <hr>
    <div class="panel-body">
      <form role="form" action="{{ url('siswa/tambah-siswa/proses') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="nama_siswa">Nama Siswa</label>
              <input type="text" name="nama_siswa" class="form-control" id="nama_siswa" placeholder="Masukan Nama">
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
              <input type="text" name="email" class="form-control" id="email" placeholder="Masukan Email">
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
              <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" placeholder="Masukan Tempat Lahir">
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
              <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir">
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
                <option value="Laki-Laki">Laki - Laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="agama">Pilih Agama</label>
              <select class="form-control" id="agama" name="agama">
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katolik">Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
              </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="nama_wali">Nama Wali</label>
              <input type="text" name="nama_wali" class="form-control" id="nama_wali" placeholder="Masukan Nama Wali">
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
              <input type="text" name="nomor_telepon" class="form-control" id="nomor_telepon" placeholder="Masukan Nomor Telepon">
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
                    <option value="{{ $kls->id }}">{{ $kls->nama_kelas }}</option>
                  @endforeach
                @endif
              </select>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="alamat_lengkap">Alamat Lengkap</label>
            <textarea class="form-control" rows="10" cols="30" placeholder="Masukan Alamat Lengkap" id="alamat_lengkap" name="alamat_lengkap"></textarea>
            @if($errors->has('alamat_lengkap'))
              <small class="text-danger">
                <strong>{{ $errors->first('alamat_lengkap') }}</strong>
              </small>
            @endif
        </div>
        
        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan Data</button>
      </form>
    </div>
  </div>

</div>

@stop