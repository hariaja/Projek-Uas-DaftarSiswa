@extends('layouts.frontend')

@section('hero')

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex justify-content-center align-items-center">
  <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
    <h1>{{ config('sekolah.welcome_message_1') }}</h1>
    <h1>{{ config('sekolah.welcome_message_2') }}</h1>
    <h2>{{ config('sekolah.sub_welcome_message') }}</h2>
    <a href="{{ url('register') }}" class="btn-get-started">{{ config('sekolah.welcome_button_text') }}</a>
  </div>
</section>
<!-- End Hero -->

@stop

@section('content')

<!-- ======= Counts Section ======= -->
<!--<section id="counts" class="counts section-bg">
  <div class="container">

    <div class="row counters justify-content-center">

      <div class="col-lg-3 col-6 text-center">
        <span data-toggle="counter-up">{{ total_siswa() }}</span>
        <p>Siswa</p>
      </div>

      <div class="col-lg-3 col-6 text-center">
        <span data-toggle="counter-up">{{ total_kelas() }}</span>
        <p>Ruangan Kelas</p>
      </div>

      <div class="col-lg-3 col-6 text-center">
        <span data-toggle="counter-up">{{ total_mapel() }}</span>
        <p>Matapelajaran Terpadu</p>
      </div>

      <div class="col-lg-3 col-6 text-center">
        <span data-toggle="counter-up">{{ total_guru() }}</span>
        <p>Guru Pengajar</p>
      </div>

    </div>

  </div>
</section> -->
<!-- End Counts Section -->

<!-- ======= Why Us Section ======= -->
<section id="why-us" class="why-us">
  <div class="container" data-aos="fade-up">

    <div class="row">
      <div class="col-lg-4 d-flex align-items-stretch">
        <div class="content">
          <h3>{{ config('sekolah.home_feature_title') }}</h3>
          <p>{{ config('sekolah.home_feature_content') }}</p>
          {{-- <div class="text-center">
            <a href="about.html" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
          </div> --}}
        </div>
      </div>
      <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
        <div class="icon-boxes d-flex flex-column justify-content-center">
          <div class="row">
            <div class="col-xl-4 d-flex align-items-stretch">
              <div class="icon-box mt-4 mt-xl-0">
                <i class="bx bx-receipt"></i>
                <h4>{{ config('sekolah.home_feature_1_title') }}</h4>
                <p>{{ config('sekolah.home_feature_1_content') }}</p>
              </div>
            </div>
            <div class="col-xl-4 d-flex align-items-stretch">
              <div class="icon-box mt-4 mt-xl-0">
                <i class="bx bx-cube-alt"></i>
                <h4>{{ config('sekolah.home_feature_2_title') }}</h4>
                <p>{{ config('sekolah.home_feature_2_content') }}</p>
              </div>
            </div>
            <div class="col-xl-4 d-flex align-items-stretch">
              <div class="icon-box mt-4 mt-xl-0">
                <i class="bx bx-images"></i>
                <h4>{{ config('sekolah.home_feature_3_title') }}</h4>
                <p>{{ config('sekolah.home_feature_3_content') }}</p>
              </div>
            </div>
          </div>
        </div><!-- End .content-->
      </div>
    </div>

  </div>
</section><!-- End Why Us Section -->

<!-- ======= Popular Courses Section ======= -->
<section id="popular-courses" class="courses">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Berita Kami</h2>
      <p>Berita Terbaru</p>
    </div>

    <div class="row" data-aos="zoom-in" data-aos-delay="100">

      @foreach ($posts as $post)
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
        <div class="course-item">
          <img src="{{ $post->thumbnail() }}" class="img-fluid" alt="...">
          <div class="course-content">
            <h3><a href="{{ route('site.single.post', $post->slug) }}">{{ $post->title }}</a></h3>
            <p class="text-justify">{!! $post->limit_content() !!} <a href="{{ route('site.single.post', $post->slug) }}">Selengkapnya</a></p>
            <div class="trainer d-flex justify-content-between align-items-center">
              <div class="trainer-profile d-flex align-items-center">
                <img src="{{ $post->user->getPhotoAdmin() }}" class="img-fluid" alt="">
                <span>{{ $post->user->name }}</span>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- End Course Item-->
      @endforeach

    </div>

  </div>
</section><!-- End Popular Courses Section -->

<!-- ======= Trainers Section ======= -->
<section id="trainers" class="trainers">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Guru</h2>
      <p>Tenaga Pengajar Yang Profesional</p>
    </div>

    <div class="row" data-aos="zoom-in" data-aos-delay="100">

      @foreach ($guru as $data)
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
        <div class="member">
          <img src="{{ $data->getAvatar() }}" class="img-fluid" alt="">
          <div class="member-content">
            <h4>{{ $data->nama_guru }}</h4>
            <span>{{ optional($data->user)->level }}</span>
            <p>
              {{ $data->email }} <br>
              {{ $data->alamat_lengkap }}
            </p>
          </div>
        </div>
      </div>
      @endforeach

    </div>

  </div>
</section>
<!-- End Trainers Section -->

@stop