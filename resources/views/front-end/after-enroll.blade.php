@extends('layouts.guest')

@section('content')

<!-- Page Banner Start -->
<div class="section page-banner">
    <div class="container">
        <div class="page-banner-content">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
            </ul>
            <h2 class="title"><span>{{ $lesson->title }}</span></h2>
        </div>
    </div>
</div>
<!-- Page Banner End -->

<!-- Courses Enroll Start -->
<div class="section">
    <div class="courses-enroll-wrapper">

        <!-- Courses Video Player Start -->
        <div class="courses-video-player">

            <!-- Video Container Start -->
            <div class="vidcontainer mb-4">
                <video class="w-100" controls>
                    <source src="{{ asset('storage/' . $lesson->video_url) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <!-- Video Container End -->

            <!-- Courses Enroll Content Start -->
            <div class="courses-enroll-content">

                <!-- Course Title & Stats -->
                <div class="courses-enroll-title mb-3">
                    <h2 class="title">{{ $lesson->title }}</h2>
                    <p><i class="icofont-eye-alt"></i> <span>{{ $lesson->enrolledUsers()->count() }}</span> Students are watching</p>
                </div>

                <!-- Tabs Menu -->
                <div class="courses-enroll-tab d-flex justify-content-between align-items-center mb-3">
                    <ul class="nav">
                        <li><button class="active btn btn-outline-secondary me-2" data-bs-toggle="tab" data-bs-target="#overview">Overview</button></li>
                        <li><button class="btn btn-outline-secondary me-2" data-bs-toggle="tab" data-bs-target="#description">Description</button></li>
                        <li><button class="btn btn-outline-secondary" data-bs-toggle="tab" data-bs-target="#instructor">Instructor</button></li>
                    </ul>
                    <div class="enroll-share">
                        <a href="#"><i class="icofont-share-alt"></i> Share</a>
                    </div>
                </div>

                <!-- Tabs Content -->
                <div class="courses-enroll-tab-content">
                    <div class="tab-content">

                        <!-- Overview Tab -->
                        <div class="tab-pane fade show active" id="overview">
                            <div class="row">
                                <div class="col-lg-4">
                                    <h3 class="title">Course Details</h3>
                                </div>
                                <div class="col-lg-8">
                                    <div class="enroll-tab-content">
                                        <p>{{ $lesson->description }}</p>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th>Instructor</th>
                                                    <td>{{ $lesson->tutor->name ?? 'Unknown' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Duration</th>
                                                    <td>{{ $lesson->duration ?? 'N/A' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Language</th>
                                                    <td>{{ $lesson->language ?? 'N/A' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Captions</th>
                                                    <td>{{ $lesson->has_captions ? 'Yes' : 'No' }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Description Tab -->
                        <div class="tab-pane fade" id="description">
                            <div class="row">
                                <div class="col-lg-4">
                                    <h3 class="title">Description</h3>
                                </div>
                                <div class="col-lg-8">
                                    <div class="enroll-tab-content">
                                        <p>{{ $lesson->description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Instructor Tab -->
                        <div class="tab-pane fade" id="instructor">
                            <div class="row">
                                <div class="col-lg-4">
                                    <h3 class="title">Instructor</h3>
                                </div>
                                <div class="col-lg-8">
                                    <div class="single-instructor d-flex mb-3">
                                        <div class="author-thumb me-3">
                                            <img src="{{ $lesson->tutor->profile_photo_url ?? asset('assets/images/author/default.jpg') }}"
                                                alt="{{ $lesson->tutor->name ?? 'Instructor' }}"
                                                class="rounded-circle"
                                                width="100" height="100">
                                        </div>
                                        <div class="author-content">
                                            <h4 class="name">{{ $lesson->tutor->name ?? 'Unknown' }}</h4>
                                            <span class="designation">{{ $lesson->tutor->designation ?? 'Instructor' }}</span>
                                            <span class="rating-star d-block mb-2">
                                                <span class="rating-bar" style="width: {{ ($lesson->tutor->rating ?? 4.0) * 20 }}%; display:inline-block; height:10px; background-color:gold;"></span>
                                            </span>
                                            <p>{{ $lesson->tutor->bio ?? 'No biography available.' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Tabs Content End -->

            </div>
            <!-- Courses Enroll Content End -->

        </div>
        <!-- Courses Video Player End -->

    </div>
</div>
<!-- Courses Enroll End -->

@endsection