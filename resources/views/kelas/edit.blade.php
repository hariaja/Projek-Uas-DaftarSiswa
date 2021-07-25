@extends('layouts.app')

@section('title', 'Halaman Edit Data Kelas')

@section('content')
<div class="content-row">
  <h2 class="content-row-title">Form Edit Data Kelas</h2>
  <a href="{{ url('kelas') }}" class="btn btn-sm btn-danger tombol"><i class="fa fa-arrow-left"></i>Kembali</a>

  <div class="panel panel-default">
    <hr>
    <div class="panel-body">
      <form role="form" action="{{ url('kelas/' . $ruangan->id . '/update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="nama_kelas">Nama Kelas</label>
              <input type="text" name="nama_kelas" class="form-control" id="nama_kelas" value="{{ $ruangan->nama_kelas }}">
              @if($errors->has('nama_kelas'))
              <small class="text-danger">
                <strong>{{ $errors->first('nama_kelas') }}</strong>
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
                      {{ $ruangan->guru_id == $gr->id ? 'selected' : '' }}>{{ $gr->nama_guru }}</option>
                  @endforeach
                @endif
              </select>
            </div>
          </div>
        </div>

        <button type="submit" class="btn btn-success btn-sm">Simpan Data</button>

      </form>
    </div>
  </div>


</div>

@stop