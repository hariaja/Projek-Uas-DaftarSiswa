@extends('layouts.app')

@section('title', 'Halaman Tambah Data Postingan')

@section('content')

<div class="content-row">
  <h2 class="content-row-title"><i class="fa fa-pencil"></i>Tambah Data Postingan</h2>
  <a href="{{ url('posts') }}" class="btn btn-sm btn-danger tombol"><i class="fa fa-backward"></i>Kembali</a>

  <div class="bs-example">

    

      <form action="{{ route('post.add.data') }}" method="POST" enctype="multipart/form-data">
        @csrf
        

          <div class="form-group">
            <label for="title">Judul Postingan</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title">
          </div>

          <div class="form-group">
            <label for="content">Isi Postingan</label>
              <textarea class="form-control" rows="10" cols="30" placeholder="Enter Content" id="content" name="content"></textarea>
          </div>

          <div class="form-group">
            <label for="thumbnail">File input</label>
            <input type="file" id="thumbnail" name="thumbnail">
            <p class="help-block">Upload File Berjenis: JPG, JPEG, GIF, PNG dan Dengan Maximal Ukuran 3 Mb.</p>
          </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-sm">Simpan Data</button>
        </div>
      </form>
    

  </div>


</div>
@stop

@section('footer')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
  ClassicEditor
      .create( document.querySelector( '#content' ) )
      .catch( error => {
          console.error( error );
      } );

      $(document).ready(function() {
        $('#lfm').filemanager('image');
      });
</script>

@stop