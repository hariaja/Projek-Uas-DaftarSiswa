@extends('layouts.app')

@section('title', 'Halaman Tabel Data Guru')

@section('content')

  <div class="content-row">

    <h2 class="content-row-title"><i class="glyphicon glyphicon-user"></i>Data Guru</h2>

    @if (auth()->user()->level == 'Admin')
    <a href="{{ url('guru/tambah-guru') }}" class="btn btn-sm btn-primary tombol"><i class="fa fa-plus"></i>Tambah Data Guru</a>
    @endif
    <a href="{{ url('guru') }}" class="btn btn-sm btn-success tombol"><i class="fa fa-refresh"></i>Refresh</a>

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
            <th>No</th>
            <th>Nama Guru</th>
            <th>Email</th>
            <th>Nomor Telepon</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th><i class="fa fa-cogs"></i></th>
          </tr>
        </thead>

        @foreach ($guru as $data)
        <tbody>
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->nama_guru }}</td>
            <td>{{ $data->email }}</td>
            <td>{{ $data->nomor_telepon }}</td>
            <td>{{ $data->jenis_kelamin }}</td>
            <td>{{ $data->agama }}</td>
            @if (auth()->user()->level == 'Admin')
            <td>
              <a href="{{ url('guru/' . $data->id . '/edit') }}" class="text-warning"><i class="glyphicon glyphicon-pencil"></i></a>
              <a href="{{ url('guru/' . $data->id . '/detail') }}" class="text-primary"><i class="fa fa-info"></i></a>
              {{-- <a href="{{ url('guru/' . $data->id . '/delete') }}" class="text-danger" onclick="return confirm('Yakin Menghapus Data?')"><i class="fa fa-trash"></i></a> --}}
              <a href="#" class="text-danger hapus" guru-id="{{ $data->id }}" guru-nama="{{ $data->nama_kelas }}"><i class="fa fa-trash"></i></a>
            </td>
            @else
            <td>
              <a href="{{ url('guru/' . $data->id . '/detail') }}" class="text-primary"><i class="fa fa-info"></i></a>
            </td>
            @endif
          </tr>
        </tbody>
        @endforeach

      </table>
    </div>
  {{ $guru->links() }}
  </div>
@stop

@section('footer')

<script>
  $('.hapus').click(function() {
    var guru_id = $(this).attr('guru-id');
    var guru_nama = $(this).attr('guru-nama');

    swal({
    title: "Hapus Data",
    text: "Apakah Anda Yakin Akan Menghapus Data Guru Dengan Nama "+ guru_nama +"?",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      window.location = "/guru/"+guru_id+"/delete";
    }
  });

  });
</script>

@stop