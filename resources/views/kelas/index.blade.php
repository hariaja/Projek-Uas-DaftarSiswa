@extends('layouts.app')

@section('title', 'Halaman Tabel Data Kelas')

@section('content')

<div class="content-row">

  <h2 class="content-row-title"><i class="fa fa-book"></i>Data Kelas</h2>


  @if (auth()->user()->level == 'Admin')

  <button type="button" class="btn btn-primary btn-sm tombol" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i>Tambah Data Kelas</button>
  
  @endif
  
  <a href="{{ url('kelas') }}" class="btn btn-sm btn-success tombol"><i class="fa fa-refresh"></i>Refresh</a>

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
            <th>Nama Kelas</th>
            <th>Nama Wali Kelas</th>
            <th>Nomor Telepon Wali Kelas</th>
            @if (auth()->user()->level == 'Admin')
              <th><i class="fa fa-cogs"></i></th>
            @endif
          </tr>
        </thead>
        @foreach ($kelas as $data)
        <tbody>
          <tr>
            <td>{{ $data->nama_kelas }}</td>
            <td>{{ optional($data->guru)->nama_guru }}</td>
            <td>{{ optional($data->guru)->nomor_telepon }}</td>
            
            @if (auth()->user()->level == 'Admin')

            <td>
              <a href="{{ url('kelas/' . $data->id . '/edit') }}" class="text-warning"><i class="glyphicon glyphicon-pencil"></i></a>
              <a href="#" class="text-danger hapus" ruangan-id="{{ $data->id }}" ruangan-nama="{{ $data->nama_kelas }}"><i class="fa fa-trash"></i></a>
            </td>
  
            @endif
          </tr>
        </tbody>
        @endforeach
      </table>
    </div>
  {{ $kelas->links() }}
  </div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <form action="{{ url('kelas/tambah-kelas') }}" method="POST">
      @csrf
      <div class="modal-body">
        
        <div class="form-group">
          <label for="nama_kelas">Nama Kelas</label>
          <input type="text" name="nama_kelas" class="form-control" id="nama_kelas" placeholder="Masukan Nama Kelas">
          @if($errors->has('nama_kelas'))
          <small class="text-danger">
            <strong>{{ $errors->first('nama_kelas') }}</strong>
          </small>
          @endif
        </div>

        <div class="form-group">
          <label for="guru_id">Pilih Wali Kelas</label>
          <select class="form-control" id="guru_id" name="guru_id">
            @if ($guru)
              @foreach ($guru as $gr)
                <option value="{{ $gr->id }}">{{ $gr->nama_guru }}</option>
              @endforeach
            @endif
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
      var ruangan_id = $(this).attr('ruangan-id');
      var ruangan_nama = $(this).attr('ruangan-nama');

      swal({
      title: "Hapus Data",
      text: "Apakah Anda Yakin Akan Menghapus Data Kelas "+ ruangan_nama +"?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "/kelas/"+ruangan_id+"/delete";
      }
    });

    });
  </script>

@stop