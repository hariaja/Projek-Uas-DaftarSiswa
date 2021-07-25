@extends('layouts.app')

@section('title', 'Halaman Detail Data Guru')

@section('content')

<div class="content-row">

  <h2 class="content-row-title"><i class="glyphicon glyphicon-user"></i>Detail Data Guru</h2>
  
  @if ( auth()->user()->level == 'Admin' )
    <a href="{{ url('guru') }}" class="btn btn-sm btn-danger tombol"><i class="fa fa-arrow-left"></i>Kembali</a>
  @endif
  
  <a href="" class="btn btn-sm btn-success tombol"><i class="fa fa-refresh"></i>Refresh</a>

  <div class="row detail">
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Detail Data Guru</h3>
        </div>
        <div class="panel-body">
          <img src="{{ $guru->getAvatar() }}" class="img-responsive img-thumbnail center-block" height="50%" width="50%" alt="Responsive image" style="margin-bottom: 10px;">
          <p><strong>{{ $guru->nama_guru }}</strong></p>
          Jumlah Mata Pelajaran Yang Diajar = <b>{{ $guru->mapel->count() }}</b> Mata Pelajaran
        </div>

        @if ( auth()->user()->level == 'Guru' )
        <a href="{{ url('guru/' . $guru->id . '/edit') }}" class="btn btn-sm btn-warning tombol"><i class="glyphicon glyphicon-pencil"></i>Edit Data</a>
        @endif

      </div>
    </div>
      
    <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">Detail Biodata Guru</div>
        <ul class="list-group">
          <li class="list-group-item list-group-item"><i class="fa fa-at"></i>Email : <strong>{{ $guru->email }}</strong></li>
            <li class="list-group-item list-group-item"><i class="glyphicon glyphicon-heart-empty"></i>Jenis Kelamin : <strong>{{ $guru->jenis_kelamin }}</strong></li>
            <li class="list-group-item list-group-item"><i class="fa fa-phone"></i>Nomor Telepon : <strong>{{ $guru->nomor_telepon }}</strong></li>
            <li class="list-group-item list-group-item"><i class="fa fa-long-arrow-right"></i>Agama : <strong>{{ $guru->nomor_telepon }}</strong></li>
            <li class="list-group-item list-group-item"><i class="fa fa-map-maker"></i>Alamat lengkap <br> <strong>{{ $guru->alamat_lengkap }}</strong></li>
        </ul>
      </div>
      
    </div>
  </div>

  <div class="panel panel-default detail">
    <div class="panel-heading">Tabel Daftar Mata Pelajaran</div>
    <div class="panel-body">

      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Kode Mapel</th>
            <th>Nama Mapel</th>
            <th>Tahun Ajaran</th>
          </tr>
        </thead>
        @foreach ($guru->mapel as $data)
        <tbody>
          <tr>
            <td>{{ $data->kode_mapel }}</td>
            <td>{{ $data->nama_mapel }}</td>
            <td>{{ $data->tahun_ajaran }}</td>
          </tr>
        </tbody>
        @endforeach
      </table>
    </div>
  </div>

</div>

@stop