@extends('layouts.app')

@section('title', 'Halaman Tabel Data Siswa')

@section('content')

  <div class="content-row">

    <h2 class="content-row-title"><i class="glyphicon glyphicon-user"></i>Data Siswa</h2>

      @if (auth()->user()->level == 'Admin')
      <a href="{{ url('siswa/tambah-siswa') }}" class="btn btn-sm btn-primary tombol"><i class="fa fa-plus"></i>Tambah Data Siswa</a>
      @endif
      <a href="{{ url('siswa/export') }}" class="btn btn-sm btn-danger tombol"><i class="fa fa-download"></i>Export to Excel</a>
      <a href="{{ url('siswa/exportpdf') }}" class="btn btn-sm btn-danger tombol"><i class="fa fa-download"></i>Export to PDF</a>
      <a href="{{ url('siswa') }}" class="btn btn-sm btn-success tombol"><i class="fa fa-refresh"></i>Refresh</a>

    <div class="bs-example">

      <form class="navbar-form navbar-left" action="" method="GET">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Cari Nama Siswa" name="cari">
        </div>
        <button type="submit" class="btn btn-default">Cari Data</button>
      </form>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Email</th>
            <th>Kelas</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Nilai Rata - Rata</th>
            <th><i class="fa fa-cogs"></i></th>
          </tr>
        </thead>

        @foreach ($siswa as $data)
        <tbody>
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $data->nama_siswa }}</td>
            <td>{{ $data->email }}</td>
            <td>{{ $data->kelas->nama_kelas }}</td>
            <td>{{ $data->jenis_kelamin }}</td>
            <td>{{ $data->agama }}</td>
            <td>{{ $data->rataRataNilai() }}</td>
            @if (auth()->user()->level == 'Admin')
            <td>
              <a href="{{ url('siswa/' . $data->id . '/edit') }}" class="text-warning"><i class="glyphicon glyphicon-pencil"></i></a>
              <a href="{{ url('siswa/' . $data->id . '/detail') }}" class="text-primary"><i class="fa fa-info"></i></a>
              <a href="#" class="text-danger delete" siswa-id="{{ $data->id }}" siswa-nama="{{ $data->nama_siswa }}"><i class="fa fa-trash"></i></a>
            </td>
            @else
            <td>
              <a href="{{ url('siswa/' . $data->id . '/detail') }}" class="text-primary"><i class="fa fa-info"></i></a>
            </td>
            @endif
          </tr>
        </tbody>
        @endforeach

      </table>
    </div>
  {{ $siswa->links() }}
  </div>
@stop

@section('footer')

<script>
  $(document).ready(function() {

    // Datatables
    // $('#datatable').DataTable();

    // Sweetalert Button
    $('.delete').click(function() {
      var siswa_id = $(this).attr('siswa-id');
      var siswa_nama = $(this).attr('siswa-nama');
        swal({
          title: "Hapus Data",
          text: "Apakah Anda Yakin Akan Menghapus Data "+ siswa_nama +"?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location = "/siswa/"+siswa_id+"/delete";
          }
        });
    });

  });
</script>

@stop