@extends('layouts.app')

@section('title', 'Halaman Tabel Data Mata Pelajaran')

@section('content')

<div class="content-row">

  <h2 class="content-row-title"><i class="fa fa-book"></i>Data Mata Pelajaran</h2>

  @if (auth()->user()->level == 'Admin')

  <button type="button" class="btn btn-primary btn-sm tombol" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i>Tambah Data Mata pelajaran</button>
  
  @endif

  <a href="{{ url('mapel') }}" class="btn btn-sm btn-success tombol"><i class="fa fa-refresh"></i>Refresh</a>

  <div class="bs-example">

    <form class="navbar-form navbar-left" action="" method="GET">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search" name="cari">
      </div>
      <button type="submit" class="btn btn-default">Cari Data</button>
    </form>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Kode Mapel</th>
          <th>Nama Mata Pelajaran</th>
          <th>Nama Guru Pengajaran</th>
          <th>Tahun Ajaran</th>

          @if (auth()->user()->level == 'Admin')
          <th><i class="fa fa-cogs"></i></th>
          @endif

        </tr>
      </thead>
      @foreach ($mapel as $data)
      <tbody>
        <tr>
          <td>{{ $data->kode_mapel }}</td>
          <td>{{ $data->nama_mapel }}</td>
          <td>{{ optional($data->guru)->nama_guru }}</td>
          <td>{{ $data->tahun_ajaran }}</td>

          @if (auth()->user()->level == 'Admin')

          <td>
            <a href="{{ url('mapel/' . $data->id . '/edit') }}" class="text-warning"><i class="glyphicon glyphicon-pencil"></i></a>
            <a href="#" class="text-danger hapus" mapel-id="{{ $data->id }}" mapel-nama="{{ $data->nama_mapel }}"><i class="fa fa-trash"></i></a>
          </td>
  
          @endif

        </tr>
      </tbody>
      @endforeach
    </table>
  {{ $mapel->links() }}
  </div>

</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Form Tambah Data Mata P elajaran</h4>
      </div>
      <form action="{{ url('mapel/tambah-mapel') }}" method="POST">
      @csrf
      <div class="modal-body">

        <div class="form-group">
          <label for="kode_mapel">Kode Mata Pelajaran</label>
          <input type="text" name="kode_mapel" class="form-control" id="kode_mapel" placeholder="Masukan Kode Mata Pelajaran">
          @if($errors->has('kode_mapel'))
          <small class="text-danger">
            <strong>{{ $errors->first('kode_mapel') }}</strong>
          </small>
          @endif
        </div>
        
        <div class="form-group">
          <label for="nama_mapel">Nama Mata Pelajaran</label>
          <input type="text" name="nama_mapel" class="form-control" id="nama_mapel" placeholder="Masukan Nama Mata Pelajaran">
          @if($errors->has('nama_mapel'))
          <small class="text-danger">
            <strong>{{ $errors->first('nama_mapel') }}</strong>
          </small>
          @endif
        </div>

        <div class="form-group">
          <label for="guru_id">Pilih Guru Pengajar</label>
          <select class="form-control" id="guru_id" name="guru_id">
            @if ($guru)
              @foreach ($guru as $gr)
                <option value="{{ $gr->id }}">{{ $gr->nama_guru }}</option>
              @endforeach
            @endif
          </select>
        </div>

        <div class="form-group">
          <label for="tahun_ajaran">Pilih Tahun Ajaran</label>
          <select class="form-control" id="tahun_ajaran" name="tahun_ajaran">
            <option value="2021/2022">2021/2022</option>
            <option value="2022/2023">2022/2023</option>
            <option value="2023/2024">2023/2024</option>
            <option value="2024/2025">2024/2025</option>
          </select>
        </div>

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-sm">Simpan Data</button>
      </div>
      </form>
    </div>
  </div>
</div>

@stop

@section('footer')
<script>
  $('.hapus').click(function() {
    var mapel_id = $(this).attr('mapel-id');
    var mapel_nama = $(this).attr('mapel-nama');

    swal({
    title: "Hapus Data",
    text: "Apakah Anda Yakin Akan Menghapus Data Dengan Nama Mapel "+ mapel_nama +"?",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      window.location = "/mapel/"+mapel_id+"/delete";
    }
  });

  });
</script>
@stop