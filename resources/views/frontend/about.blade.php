@extends('layouts.frontend')

@section('content')

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs" data-aos="fade-in">
  <div class="container">
    <h2>About Us</h2>
  </div>
</div>
<!-- End Breadcrumbs -->

<!-- ======= About Section ======= -->
<section id="about" class="about">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>About</h2>
      <p>About Us</p>
    </div>

    <div class="row">
      <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
        <img src="{{ asset('images/hari2.jpg') }}" class="img-fluid rounded" alt="">
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
        <h3>Aplikasi Pendaftaran Siswa Online dan Pengolahan Data Siswa Baru</h3>
        <p class="font-italic">
          Projek Ujian Akhir Semester
        </p>
        <ul>
          <li><i class="fas fa-user mr-3"></i><b>Aldiama Hari Octavian Yuwono</b></li>
          <li><i class="fas fa-check mr-3"></i><b>312019012</b></li>
          <li><i class="fas fa-file mr-3"></i><b>Teknik Komputer 2019 A</b></li>
        </ul>
        <p>
          Dibuat sebagai salah satu syarat kelulusan Matakuliah <b>Pemrograman Web Framework</b> <br>
          Program Studi <b>Teknik Komputer, Politeknik Sukabumi 2021</b>
        </p>
      </div>
    </div>

  </div>
</section>
<!-- End About Section -->

@stop