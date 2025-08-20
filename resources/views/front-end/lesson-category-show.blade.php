@extends('layouts.guest')

@section('content')

<!-- Page Banner Start -->
<div class="section page-banner">

    <div class="container">
        <!-- Page Banner Start -->
        <div class="page-banner-content">
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Lesson</li>
            </ul>
            <h2 class="title">{{ $category->name }} &nbsp;<span>Lessons</span></h2>
        </div>
        <!-- Page Banner End -->
    </div>

</div>
<!-- Page Banner End -->

<!-- Courses Start -->
<div class="section section-padding">
    <div class="container">

        <!-- Courses Wrapper Start  -->
        <div class="courses-wrapper-02">
            <div class="row">
                @forelse ($category->lessons as $lesson)
                <div class="col-lg-4 col-md-6">
                    <!-- Single Courses Start -->
                    <div class="single-courses">
                        <div class="courses-images">
                            <a href="{{ route('lessons.show', $lesson->id) }}">
                                <img src="{{ $lesson->thumbnail_url ?? asset('assets/images/default-lesson.jpg') }}" alt="Lesson Thumbnail">
                            </a>
                        </div>
                        <div class="courses-content">
                            <div class="courses-author">
                                <div class="author">
                                    <div class="author-thumb">
                                        <a href="#">
                                            <img src="{{ $lesson->tutor->profile_photo_url ?? asset('assets/images/author/default.jpg') }}" alt="Tutor">
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