@extends('layouts.app')

@section('title', 'Halaman Dashboard')

@section('content')

  <div class="content-row">
    <h2 class="content-row-title"><i class="glyphicon glyphicon-home"></i>Dashboard</h2> 

    <div class="row">
      <div class="col-md-6">
        <div class="panel panel-default" align="center">
          <div class="panel-heading"><strong>Siswa Dengan Peringkat Lima (5) Besar</strong></div>
          <div class="panel-body">

            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Siswa</th>
                  <th>Kelas</th>
                  <th>Nilai Rata - Rata</th>
                </tr>
              </thead>
              @php $no = 1; @endphp
              @foreach (rangking() as $data)
              <tbody>
                <tr>
                  <td>{{ $no }}</td>
                  <td>{{ $data->nama_siswa }}</td>
                  <td>{{ optional($data->kelas)->nama_kelas }}</td>
                  <td>{{ $data->rataRataNilai }}</td>
              </tbody>
              @php $no++; @endphp
              @endforeach
            </table>
            <strong>* Nilai Diambil Berdasarkan Pendapatan Nilai Keseluruhan Dari Tiap Tiap Mata Pelajaran Per Jurusan</strong>

          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="row">
          <div class="col-md-6">
            <div class="panel panel-default" align="center">
              <div class="panel-heading"><Strong>Jumlah Total Siswa</Strong></div>
              <div class="panel-body">
                <b>{{ total_siswa() }}</b>
              </div>
            </div>
          </div>
      
          <div class="col-md-6">
            <div class="panel panel-default" align="center">
              <div class="panel-heading"><Strong>Jumlah Total Guru</Strong></div>
              <div class="panel-body">
                <b>{{ total_guru() }}</b>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="panel panel-default" align="center">
              <div class="panel-heading"><Strong>Jumlah Total Kelas</Strong></div>
              <div class="panel-body">
                <b>{{ total_kelas() }}</b>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="panel panel-default" align="center">
              <div class="panel-heading"><Strong>Jumlah Total Mata Pelajaran</Strong></div>
              <div class="panel-body">
                <b>{{ total_mapel() }}</b>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

</div>
@stop