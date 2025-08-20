@extends('layouts.guest')

@section('content')

<!-- Page Banner Start -->
<div class="section page-banner">
    <div class="container">
        <!-- Page Banner Start -->
        <div class="page-banner-content">
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
            </ul>
            <h2 class="title"><span>{{ $lesson->title }}</span></h2>
        </div>
        <!-- Page Banner End -->
    </div>

</div>
<!-- Page Banner End -->
<!-- Courses Enroll Start -->
<div class="section">

    <!-- Courses Enroll Wrapper Start -->
    <div class="courses-enroll-wrapper">

        <!-- Courses Video Player Start -->
        <div class="courses-video-player">

            <!-- Courses Video Container Start -->
            <div class="vidcontainer">
                <video id="myvid"></video>

                <div class="video-play-bar">
                    <div class="topControl">
                        <div class="progress">
                            <span class="bufferBar"></span>
                            <span class="timeBar"></span>
                        </div>
                        <div class="time">
                            <span class="current"></span> /
                            <span class="duration"></span>
                        </div>
                    </div>

                    <div class="controllers">
                        <div class="controllers-left">
                            <button class="prevvid disabled" title="Previous video"><i class="icofont-ui-previous"></i></button>
                            <button class="btnPlay" title="Play/Pause video"></button>
                            <button class="nextvid" title="Next video"><i class="icofont-ui-next"></i></button>
                            <button class="sound sound2" title="Mute/Unmute sound"></button>
                            <div class="volume" title="Set volume">
                                <span class="volumeBar"></span>
                            </div>
                        </div>

                        <div class="controllers-right">
                            <button class="btnspeed" title="Video speed"><i class="fa fa-gear"></i></button>
                            <ul class="speedcnt">
                                <li class="spdx50">1.5</li>
                                <li class="spdx25">1.25</li>
                                <li class="spdx1 selected">Normal</li>
                                <li class="spdx050">0.5</li>
                            </ul>
                            <button class="btnFS" title="full screen"></button>
                        </div>
                    </div>
                </div>

                <div class="bigplay" title="play the video">
                    <i class="fa fa-play"></i>
                </div>

                <div class="loading">
                    <div class="spinner-border spinner">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>

            </div>
            <!-- Courses Video Container End -->

            <!-- Courses Enroll Content Start -->
            <div class="courses-enroll-content">

                <!-- Courses Enroll Title Start -->
                <div class="courses-enroll-title">
                    <h2 class="title">{{ $lesson->title }}</h2>
                    <p><i class="icofont-eye-alt"></i> <span>{{ $lesson->enrolledUsers()->count() }}</span> Students are watching</p>
                </div>
                <!-- Courses Enroll Title End -->

                <!-- Courses Enroll Tab Start -->
                <div class="courses-enroll-tab">
                    <div class="enroll-tab-menu">
                        <ul class="nav">
                            <li><button class="active" data-bs-toggle="tab" data-bs-target="#tab1">Overview</button></li>
                            <li><button data-bs-toggle="tab" data-bs-target="#tab2">Description</button></li>
                            <li><button data-bs-toggle="tab" data-bs-target="#tab4">Instructor</button></li>
                        </ul>
                    </div>
                    <div class="enroll-share">
                        <a href="#"><i class="icofont-share-alt"></i> Share</a>
                    </div>
                </div>
                <!-- Courses Enroll Tab End -->

                <!-- Courses Enroll Tab Content Start -->
                <div class="courses-enroll-tab-content">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab1">

                            <!-- Overview Start -->
                            <div class="overview">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="enroll-tab-title">
                                            <h3 class="title">Course Details</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="enroll-tab-content">
                                            <p>{{ $lesson->description }}</p>

                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th>Instructor <span>:</span></th>
                                                        <td>{{ $lesson->tutor->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Duration <span>:</span></th>
                                                        <td>{{ $lesson->duration }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Language <span>:</span></th>
                                                        <td>{{ $lesson->language }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Caption’s <span>:</span></th>
                                                        <td>Yes</td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Overview End -->

                        </div>
                        <div class="tab-pane fade" id="tab2">

                            <!-- Description Start -->
                            <div class="description">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="enroll-tab-title">
                                            <h3 class="title">Description</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="enroll-tab-content">
                                            <p>{{ $lesson->description }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Description End -->

                        </div>
                        <div class="tab-pane fade" id="tab4">

                            <!-- Instructor Start -->
                            <div class="instructor">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="enroll-tab-title">
                                            <h3 class="title">Instructor</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="enroll-tab-content">

                                            <!-- Single Instructor Start -->
                                            <div class="single-instructor">
                                                <div class="review-author">
                                                    <div class="author-thumb">
                                                        <img src="{{ asset('assets/images/author/author-06.jpg') }}" alt="Author">
                                                    </div>
                                                    <div class="author-content">
                                                        <h4 class="name">{{ $lesson->tutor->name }}</h4>
                                                        <span class="designation">{{ $lesson->tutor->designation }}</span>
                                                        <span class="rating-star">
                                                            <span class="rating-bar" style="width: 80%;"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been industry's standard dummy text ever since the 1500s when andom unknown printer took a galley of type scrambled it to make a type specimen book.</p>
                                            </div>
                                            <!-- Single Instructor End -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Instructor End -->

                        </div>
                    </div>
                </div>
                <!-- Courses Enroll Tab Content End -->

            </div>
            <!-- Courses Enroll Content End -->
        </div>
        <!-- Courses Video Player End -->


    </div>
    <!-- Courses Enroll Wrapper End -->

</div>
<!-- Courses Enroll End -->
@endsection