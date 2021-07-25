@extends('layouts.app')

@section('title', 'Halaman Detail Data Admin')

@section('content')

  <div class="content-row">

    <h2 class="content-row-title"><i class="glyphicon glyphicon-user"></i>Detail Data Admin</h2>

    <a href="{{ url('dashboard') }}" class="btn btn-sm btn-danger tombol"><i class="fa fa-arrow-left"></i>Kembali Ke Dashboard</a>
    <a href="" class="btn btn-sm btn-success tombol"><i class="fa fa-refresh"></i>Refresh</a>

    <div class="row detail">
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Detail Data Admin</h3>
          </div>
          <div class="panel-body">
            <img src="{{ $admin->getPhotoAdmin() }}" class="img-responsive img-thumbnail center-block" height="50%" width="50%" alt="Responsive image" style="margin-bottom: 10px">
            <p><strong>{{ $admin->name }}</strong></p>
            <p><strong>{{ $admin->level }}</strong></p>
          </div>
        </div>
      </div>
      
      <div class="col-md-8">

        <div class="panel panel-default">
          <div class="panel-heading">Detail Biodata Admin</div>
          <ul class="list-group">
            <li class="list-group-item list-group-item"><i class="fa fa-at"></i>Email : <strong>{{ $admin->email }}</strong></li>
          </ul>
        </div>
        
      </div>
    </div>
  </div>

@stop
