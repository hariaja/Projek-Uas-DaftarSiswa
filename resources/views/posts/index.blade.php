@extends('layouts.app')

@section('title', 'Halaman Tabel Data Postingan')

@section('content')

<div class="content-row">
  <h2 class="content-row-title"><i class="fa fa-pencil"></i>Data Postingan</h2>

  @if (auth()->user()->level == 'Admin')
  <a href="{{ route('post.add') }}" class="btn btn-primary btn-sm tombol"><i class="fa fa-plus"></i>Tambah Data Postingan</a>
  @endif
  <a href="{{ url('posts') }}" class="btn btn-sm btn-success tombol"><i class="fa fa-refresh"></i>Refresh</a>

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
          <th>Judul Postingan</th>
          <th>Diposting Oleh</th>
          <th><i class="fa fa-cogs"></i></th>
        </tr>
      </thead>
      @foreach ($posts as $data)
      <tbody>
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $data->title }}</td>
          <td>{{ $data->user->name }}</td>
          <td>
            <a href="{{ route('site.single.post', $data->slug) }}" target="_blank" class="text-info"><i class="fa fa-eye"></i></a>
            <a href="#" class="text-warning"><i class="glyphicon glyphicon-pencil"></i></a>
            <a href="{{ url('posts/' . $data->id . '/delete') }}" onclick="return confirm('Yakin Hapus Data?')" class="text-danger hapus"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
      </tbody>
      @endforeach
    </table>
    {{ $posts->links() }}
  </div>

</div>
@stop