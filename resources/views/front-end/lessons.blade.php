@extends('layouts.guest')

@section('content')

<!-- Page Banner Start -->
<div class="section page-banner">

    <img class="shape-1 animation-round" src="assets/images/shape/shape-8.png" alt="Shape">

    <img class="shape-2" src="assets/images/shape/shape-23.png" alt="Shape">

    <div class="container">
        <!-- Page Banner Start -->
        <div class="page-banner-content">
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Courses</li>
            </ul>
            <h2 class="title">My <span>Courses</span></h2>
        </div>
        <!-- Page Banner End -->
    </div>

    <!-- Shape Icon Box Start -->
    <div class="shape-icon-box">

        <img class="icon-shape-1 animation-left" src="assets/images/shape/shape-5.png" alt="Shape">

        <div class="box-content">
            <div class="box-wrapper">
                <i class="flaticon-badge"></i>
            </div>
        </div>

        <img class="icon-shape-2" src="assets/images/shape/shape-6.png" alt="Shape">

    </div>
    <!-- Shape Icon Box End -->

    <img class="shape-3" src="assets/images/shape/shape-24.png" alt="Shape">

    <img class="shape-author" src="assets/images/author/author-11.jpg" alt="Shape">

</div>
<!-- Page Banner End -->

<!-- Courses Start -->
<div class="section section-padding">
    <div class="container">

        <!-- Courses Wrapper Start  -->
        <div class="courses-wrapper-02">
            <div class="row">
                @forelse ($lessons as $lesson)
                <div class="col-lg-4 col-md-6">
                    <!-- Single Courses Start -->
                    <div class="single-courses">
                        <div class="courses-images">
                            <a href="{{ route('lessons.show', $lesson->id) }}">
                                <img src="{{ asset('assets/images/default-lesson.jpg') }}" alt="Lesson Thumbnail">
                            </a>
                        </div>
                        <div class="courses-content">
                            <div class="courses-author">
                                <div class="author">
                                    <div class="author-thumb">
                                        <a href="#">
                                            <img src="{{ asset('assets/images/author/default.jpg') }}" alt="Tutor">
                                        </a>
                                    </div>
                                    <div class="author-name">
                                        <a class="name" href="#">{{ $lesson->tutor->name ?? 'Unknown Tutor' }}</a>
                                    </div>
                                </div>
                                <div class="tag">
                                    <a href="#">{{ $lesson->category->name }}</a>
                                </div>
                            </div>

                            <h4 class="title">
                                <a href="{{ route('lessons.show', $lesson->id) }}">{{ $lesson->title }}</a>
                            </h4>
                            <div class="courses-meta">
                                <span><i class="icofont-clock-time"></i> ~15 mins</span>
                                <span><i class="icofont-read-book"></i> Resource</span>
                            </div>
                            <div class="courses-price-review">
                                <div class="courses-price">
                                    <span class="sale-parice">Free</span>
                                </div>
                                <div class="courses-review">
                                    <span class="rating-count">4.8</span>
                                    <span class="rating-star">
                                        <span class="rating-bar" style="width: 85%;"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single Courses End -->
                </div>
                @empty
                <p class="text-center">No lessons available in this category yet.</p>
                @endforelse
            </div>
        </div>
        <!-- Courses Wrapper End  -->

    </div>
</div>
<!-- Courses End -->

@endsection