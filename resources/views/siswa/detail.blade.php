@extends('layouts.app')

@section('title', 'Halaman Detail Data Siswa')
@section('header')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

@stop

@section('content')

  <div class="content-row">

    <h2 class="content-row-title"><i class="glyphicon glyphicon-user"></i>Detail Data Siswa</h2>

    @if ( auth()->user()->level == 'Admin' )
      <a href="{{ url('siswa') }}" class="btn btn-sm btn-danger tombol"><i class="fa fa-arrow-left"></i>Kembali</a>
    @elseif ( auth()->user()->level == 'Guru' )
    <a href="{{ url('siswa') }}" class="btn btn-sm btn-danger tombol"><i class="fa fa-arrow-left"></i>Kembali</a>
    @else
    <h5>{{ $siswa->nama_siswa }}</h5>
    @endif
    <a href="" class="btn btn-sm btn-success tombol"><i class="fa fa-refresh"></i>Refresh</a>

    <div class="row detail">
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Detail Data Siswa</h3>
          </div>
          <div class="panel-body">
            <img src="{{ $siswa->getPhoto() }}" class="img-responsive img-thumbnail center-block" height="50%" width="50%" alt="Responsive image" style="margin-bottom: 10px">
            <p><strong>{{ $siswa->nama_siswa }}</strong></p>

            <hr>

            <h6>Status Kelulusan <br style="margin-bottom: 5px"> <strong>{{ $siswa->keterangan() }}</strong></h6>

            Mata Pelajaran Yang Diambil<i class="fa fa-arrow-right"></i><span class="badge badge-success bagianShow">{{ $siswa->mapel->count() }}</span> <br>

            Rata - Rata Nilai Didapat<i class="fa fa-arrow-right"></i><span class="badge badge-primary bagianShow">{{ $siswa->rataRataNilai() }}</span> <br>

            @if (auth()->user()->level == 'Siswa')
              <a href="{{ url('siswa/' . $siswa->id . '/edit') }}" class="btn btn-sm btn-warning tombol"><i class="glyphicon glyphicon-pencil"></i>Edit Data</a>
            @elseif (auth()->user()->level == 'Guru')
              <button type="button" class="btn btn-primary btn-sm tombol" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-plus"></i>Input Nilai
              </button>
            @else
              {{-- <a href="{{ url('siswa/' . $siswa->id . '/edit') }}" class="btn btn-sm btn-warning tombol"><i class="glyphicon glyphicon-pencil"></i>Edit Profile</a> --}}
            @endif
          </div>
        </div>
      </div>
        
      <div class="col-md-8">
        <div class="panel panel-default">
          <div class="panel-heading">Detail Biodata Siswa</div>
          <ul class="list-group">
            <li class="list-group-item list-group-item"><i class="fa fa-at"></i>Email : <strong>{{ $siswa->email }}</strong></li>
            <li class="list-group-item list-group-item"><i class="glyphicon glyphicon-folder-open"></i>Kelas : <strong>{{ optional($siswa->kelas)->nama_kelas }}</strong></li>
            <li class="list-group-item list-group-item"><i class="glyphicon glyphicon-heart-empty"></i>Jenis Kelamin : <strong>{{ $siswa->jenis_kelamin }}</strong></li>
            <li class="list-group-item list-group-item"><i class="fa fa-location-arrow"></i>Tempat Lahir : <strong>{{ $siswa->tempat_lahir }}</strong></li>
            <li class="list-group-item list-group-item"><i class="fa fa-calendar"></i>Tanggal Lahir : <strong>{{ $siswa->tanggal_lahir }}</strong></li>
            <li class="list-group-item list-group-item"><i class="fa fa-phone"></i>Nomor Telepon : <strong>{{ $siswa->nomor_telepon }}</strong></li>
            <li class="list-group-item list-group-item"><i class="fa fa-long-arrow-right"></i>Agama : <strong>{{ $siswa->nomor_telepon }}</strong></li>
            <li class="list-group-item list-group-item"><i class="fa fa-user"></i>Nama Wali : <strong>{{ $siswa->nama_wali }}</strong></li>
            <li class="list-group-item list-group-item"><i class="fa fa-map-maker"></i>Alamat lengkap <br> <strong>{{ $siswa->alamat_lengkap }}</strong></li>
          </ul>
        </div>
        
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading">Tabel Data Nilai Siswa</div>
      <div class="panel-body">

        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Kode Mapel</th>
              <th>Nama Mapel</th>
              <th>Nilai</th>
              <th>Guru Pengajar</th>
              <th>Tahun Ajaran</th>
              @if (auth()->user()->level == 'Guru')
                <th><i class="fa fa-cog"></i></th>
              @endif
            </tr>
          </thead>
          @foreach ($siswa->mapel as $data)
          <tbody>
            <tr>
              <td>{{ $data->kode_mapel }}</td>
              <td>{{ $data->nama_mapel }}</td>

              @if (auth()->user()->level == 'Guru')
              <td>
                <a href="#" class="nilai" data-type="text" data-pk="{{ $data->id }}" data-url="/api/siswa/edit-nilai/{{ $siswa->id }}"  data-title="Masukan Nilai">{{ $data->pivot->nilai }}</a>
              </td>
              @else
                <td>{{ $data->pivot->nilai }}</td>
              @endif
              <td><a href="{{ url('guru/' . $data->guru->id . '/detail') }}">{{ $data->guru->nama_guru }}</a></td>
              <td>{{ $data->tahun_ajaran }}</td>

              @if (auth()->user()->level == 'Guru')
                <td>
                  <a href="{{ url('siswa/' . $siswa->id . "/" . $data->id . '/delete-nilai') }}" class="fa fa-trash text-danger" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data?')"></a>
                </td>
              @endif
              
            </tr>
          </tbody>
          @endforeach
        </table>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-body">
        <div id="chartNilai"></div>
      </div>
    </div>

  </div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Form Input Data Nilai</h4>
      </div>
      <form action="{{ url('siswa/' . $siswa->id . '/tambah-nilai') }}" method="POST">
        @csrf
        <div class="modal-body">

          <div class="form-group">
            <label for="nama_mapel">Nama Mata Pelajaran</label>
            <select class="form-control" id="nama_mapel" name="nama_mapel">
              <option selected>Pilih Nama Mata Pelajaran</option>
              @foreach ($mapel as $mp)
                <option value="{{ $mp->id }}">{{ $mp->nama_mapel }}</option>
              @endforeach
            </select>

            @if($errors->has('nama_mapel'))
            <small class="text-danger">
              <b>{{ $errors->first('nama_mapel') }}</b>
            </small>
          @endif
          </div>

          <div class="form-group">
            <label for="nilai" class="control-label mb-1">Masukan Nilai</label>
            <input name="nilai" id="nilai" type="text" class="form-control" value="{{ old('nilai') }}" placeholder="Masukan Nilai Siswa">

            @if($errors->has('nilai'))
            <small class="text-danger">
              <b>{{ $errors->first('nilai') }}</b>
            </small>
            @endif
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
      </form>
    </div>
  </div>
</div>
@stop

@section('footer')

<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
  Highcharts.chart('chartNilai', {
      chart: {
          type: 'column'
      },
      title: {
          text: 'Laporan Data Nilai Siswa'
      },
      xAxis: {
          categories: {!! json_encode($categories) !!},
          crosshair: true
      },
      yAxis: {
          min: 0,
          title: {
              text: 'Nilai'
          }
      },
      tooltip: {
          headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
          footerFormat: '</table>',
          shared: true,
          useHTML: true
      },
      plotOptions: {
          column: {
              pointPadding: 0.2,
              borderWidth: 0
          }
      },
      series: [{
          name: 'Nilai Siswa',
          data: {!! json_encode($data_nilai) !!}
      }]
  });

  $(document).ready(function() {
    $('.nilai').editable();
  });

</script>

@stop