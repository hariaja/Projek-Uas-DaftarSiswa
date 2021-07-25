@extends('layouts.app')

@section('title', 'Halaman Edit Data Mapel')

@section('content')
<div class="content-row">
  <h2 class="content-row-title">Form Edit Data Mapel</h2>
  <a href="{{ url('mapel') }}" class="btn btn-sm btn-danger tombol"><i class="fa fa-arrow-left"></i>Kembali</a>
  <div class="panel panel-default">
    <hr>
    <div class="panel-body">
      <form role="form" action="{{ url('mapel/' . $mapel->id . '/update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="nama_mapel">Nama Kelas</label>
              <input type="text" name="nama_mapel" class="form-control" id="nama_mapel" value="{{ $mapel->nama_mapel }}">
              @if($errors->has('nama_mapel'))
              <small class="text-danger">
                <strong>{{ $errors->first('nama_mapel') }}</strong>
              </small>
              @endif
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="guru_id">Pilih Wali Kelas</label>
              <select class="form-control" id="guru_id" name="guru_id">
                @if ($guru)
                @foreach ($guru as $gr)
                    <option value="{{ $gr->id }}"
                      {{ $mapel->guru_id == $gr->id ? 'selected' : '' }}>{{ $gr->nama_guru }}</option>
                  @endforeach
                @endif
              </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="nama_mapel">Nama Kelas</label>
              <input type="text" name="nama_mapel" class="form-control" id="nama_mapel" value="{{ $mapel->nama_mapel }}">
              @if($errors->has('nama_mapel'))
              <small class="text-danger">
                <strong>{{ $errors->first('nama_mapel') }}</strong>
              </small>
              @endif
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="tahun_ajaran">Pilih Tahun Ajaran</label>
              <select class="form-control" id="tahun_ajaran" name="tahun_ajaran">
                <option value="2021/2022" @if($mapel->tahun_ajaran == '2021/2022') selected @endif>2021/2022</option>
                <option value="2022/2023" @if($mapel->tahun_ajaran == '2022/2023') selected @endif>2022/2023</option>
                <option value="2023/2024" @if($mapel->tahun_ajaran == '2023/2024') selected @endif>2023/2024</option>
                <option value="2024/2025" @if($mapel->tahun_ajaran == '2024/2025') selected @endif>2024/2025</option>
              </select>
            </div>
          </div>
        </div>

        <button type="submit" class="btn btn-success btn-sm">Ubah Data</button>

      </form>
    </div>
  </div>


</div>

@stop