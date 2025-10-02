@extends('layouts.guest')

@section('content')

<!-- Page Banner Start -->
<div class="section page-banner">
    <div class="container">
        <div class="page-banner-content">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="active">Lessons</li>
            </ul>
            <h2 class="title">{{ $category->name ?? 'Category' }} <span>Lessons</span></h2>
        </div>
    </div>
</div>
<!-- Page Banner End -->

<!-- Courses Start -->
<div class="section section-padding">
    <div class="container">

        <!-- Courses Wrapper Start -->
        <div class="courses-wrapper-02">
            <div class="row">
                @forelse ($category->lessons as $lesson)
                <div class="col-lg-4 col-md-6 mb-4">
                    <!-- Single Course Start -->
                    <div class="single-courses">
                        <div class="courses-images">
                            <a href="{{ route('lessons.show', $lesson->id) }}">
                                <img src="{{ $lesson->thumbnail_url ? asset('storage/'.$lesson->thumbnail_url) : asset('assets/images/default-lesson.jpg') }}" 
                                     alt="{{ $lesson->title }}" class="img-fluid">
                            </a>
                        </div>
                        <div class="courses-content">
                            <div class="courses-author d-flex justify-content-between align-items-center mb-2">
                                <div class="author d-flex align-items-center">
                                    <div class="author-thumb me-2">
                                        <a href="#">
                                            <img src="{{ $lesson->tutor->profile_photo_url ?? asset('assets/images/author/default.jpg') }}" 
                                                 alt="{{ $lesson->tutor->name ?? 'Tutor' }}" class="rounded-circle">
                                        </a>
                                    </div>
                                    <div class="author-name">
                                        <a class="name" href="#">{{ $lesson->tutor->name ?? 'Unknown Tutor' }}</a>
                                    </div>
                                </div>
                                <div class="tag">
                                    <a href="#">{{ $lesson->category->name ?? 'Uncategorized' }}</a>
                                </div>
                            </div>

                            <h4 class="title">
                                <a href="{{ route('lessons.show', $lesson->id) }}">{{ $lesson->title }}</a>
                            </h4>

                            <div class="courses-meta d-flex justify-content-between mt-2">
                                <span><i class="icofont-clock-time"></i> {{ $lesson->duration ?? '~15 mins' }}</span>
                                <span><i class="icofont-read-book"></i> {{ $lesson->resource_type ?? 'Resource' }}</span>
                            </div>

                            <div class="courses-price-review d-flex justify-content-between align-items-center mt-3">
                                <div class="courses-price">
                                    <span class="sale-price">{{ $lesson->price ? '$'.$lesson->price : 'Free' }}</span>
                                </div>
                                <div class="courses-review">
                                    <span class="rating-count">{{ $lesson->average_rating ?? '4.8' }}</span>
                                    <span class="rating-star">
                                        <span class="rating-bar" style="width: {{ ($lesson->average_rating ?? 4.8) * 20 }}%;"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single Course End -->
                </div>
                @empty
                <div class="col-12">
                    <p class="text-center">No lessons available in this category yet.</p>
                </div>
                @endforelse
            </div>
        </div>
        <!-- Courses Wrapper End -->

    </div>
</div>
<!-- Courses End -->

@endsection
