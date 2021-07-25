@extends('layouts.frontend')

@section('content')

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs" data-aos="fade-in">
  <div class="container">
    <h2>Pendaftaran Online</h2>
    <p>Berbagung bersama kami untuk menciptakan Generasi Yang Lebih Baik bagi Nusa dan Bangsa.</p>
  </div>
</div>
<!-- End Breadcrumbs -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact mt-4">

  <div class="container" data-aos="fade-up">

    <h5 class="text-center">Formulir Pendaftaran Online Siswa Baru</h5>
    <hr>

    {{-- < action="forms/contact.php" method="post" role="form" class="php-email-form"> --}}
      {!! Form::open(['url' => 'post/register', 'class' => 'php-email-form', 'files' => 'true','enctype'=>'multipart/form-data']) !!}

        <div class="form-group">
            {!! Form::label('nama_siswa', 'Nama Lengkap') !!} <br>
            {!! Form::text('nama_siswa', '', ['class' => 'form-control', 'placeholder' => 'Masukan Nama Lengkap Anda']) !!}

            @if($errors->has('nama_siswa'))
            <small class="text-danger">
              <strong>{{ $errors->first('nama_siswa') }}</strong>
            </small>
            @endif
        </div>

        <div class="form-row">
          <div class="col-md-6 form-group">
            {!! Form::label('email', 'Email') !!} <br>
            {!! Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Masukan Email Anda']) !!}

            @if($errors->has('email'))
            <small class="text-danger">
              <strong>{{ $errors->first('email') }}</strong>
            </small>
            @endif
          </div>

          <div class="col-md-6 form-group">
            {!! Form::label('password', 'Password') !!} <br>
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Masukan Password Baru']) !!}

            @if($errors->has('password'))
            <small class="text-danger">
              <strong>{{ $errors->first('password') }}</strong>
            </small>
            @endif
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-6 form-group">
            {!! Form::label('tempat_lahir', 'Tempat Lahir') !!} <br>
            {!! Form::text('tempat_lahir', '', ['class' => 'form-control', 'placeholder' => 'Masukan Tempat Lahir Anda']) !!}

            @if($errors->has('tempat_lahir'))
            <small class="text-danger">
              <strong>{{ $errors->first('tempat_lahir') }}</strong>
            </small>
            @endif
          </div>
          <div class="col-md-6 form-group">
            {!! Form::label('tanggal_lahir', 'Tanggal Lahir') !!} <br>
            {!! Form::date('tanggal_lahir', '', ['class' => 'form-control']) !!}

            @if($errors->has('tanggal_lahir'))
            <small class="text-danger">
              <strong>{{ $errors->first('tanggal_lahir') }}</strong>
            </small>
            @endif
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-6 form-group">
            {!! Form::label('nomor_telepon', 'Nomor Telepon') !!} <br>
            {!! Form::text('nomor_telepon', '', ['class' => 'form-control', 'placeholder' => 'Masukan Nama Nomor Telepon Anda']) !!}

            @if($errors->has('nomor_telepon'))
            <small class="text-danger">
              <strong>{{ $errors->first('nomor_telepon') }}</strong>
            </small>
            @endif
          </div>
          <div class="col-md-6 form-group">
            {!! Form::label('nama_wali', 'Nama Wali') !!} <br>
            {!! Form::text('nama_wali', '', ['class' => 'form-control', 'placeholder' => 'Masukan Nama Wali Anda']) !!}

            @if($errors->has('nama_wali'))
            <small class="text-danger">
              <strong>{{ $errors->first('nama_wali') }}</strong>
            </small>
            @endif
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-6 form-group">
            {!! Form::label('jenis_kelamin', 'Pilih Jenis Kelamin') !!} <br>
            {!! Form::select('jenis_kelamin', ['Laki-Laki' => 'Laki - Laki', 'Perempuan' => 'Perempuan'], null, ['class' => 'form-control']) !!}
          </div>

          <div class="col-md-6 form-group">
            {!! Form::label('agama', 'Pilih Agama') !!} <br>
            {!! Form::select('agama', ['Islam' => 'Islam', 'Kristen' => 'Kristen', 'Katolik' => 'Katolik', 'Hindu' => 'Hindu', 'Buddha' => 'Buddha'], null, ['class' => 'form-control']) !!}
          </div>
        </div>

        <div class="form-group">
          {!! Form::label('gambar', 'Masukan Gambar') !!} <br>
          {!! Form::file('gambar') !!}
          <br>
          @if($errors->has('gambar'))
            <small class="text-danger">
              <strong>{{ $errors->first('gambar') }}</strong>
            </small>
            @endif
        </div>

        <div class="form-group">
          {!! Form::label('alamat_lengkap', 'Alamat Lengkap') !!} <br>
          {!! Form::textarea('alamat_lengkap', '', ['class' => 'form-control', 'placeholder' => 'Masukan Alamat Lengkap Anda']) !!}

          @if($errors->has('alamat_lengkap'))
            <small class="text-danger">
              <strong>{{ $errors->first('alamat_lengkap') }}</strong>
            </small>
            @endif
        </div>

        <div class="text-center">
          {{-- <button type="submit">Kirim Data Diri</button> --}}
          <input type="submit" class="tombol" value="Kirim Data Diri">
          {{-- {!! Form::submit('Click Me!') !!} --}}
        </div>
    
      {!! Form::close() !!}

  </div>

</section>
<!-- End Contact Section -->

@stop