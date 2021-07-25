@extends('layouts.frontend')
@section('content')

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs" data-aos="fade-in">
  <div class="container">
    <h2>Post Details</h2>
    <p>Halaman Post Detail.</p>
  </div>
</div>
<!-- End Breadcrumbs -->

    <!-- ======= Cource Details Section ======= -->
    <section id="course-details" class="course-details">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-8">
            <img src="{{ $posts->thumbnail() }}" class="img-fluid rounded" alt="">
            <h3>{{ $posts->title }}</h3>
            <p class="text-justify">
              {!! $posts->content !!}
            </p>
          </div>
          <div class="col-lg-4">

            <div class="course-info d-flex justify-content-between align-items-center">
              <img src="{{ $posts->user->getPhotoAdmin() }}" class="img-fluid rounded" alt="">
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Diposting Oleh</h5>
              <p><a href="#">{{ $posts->user->name }}</a></p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Level Akses</h5>
              <p>{{ $posts->user->level }}</p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Tanggal Posting</h5>
              <p>{{ $posts->created_at->format('D, d M Y') }}</p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Waktu Posting</h5>
              <p>{{ $posts->created_at->format('g:i a') }}</p>
            </div>

          </div>
        </div>

      </div>
    </section><!-- End Cource Details Section -->

@stop