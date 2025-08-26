@extends('layouts.guest')

@section('content')

<!-- Slider Start -->
<div class="section slider-section">

    <!-- Slider Shape Start -->
    <div class="slider-shape">
        <img class="shape-1 animation-round" src="assets/images/shape/shape-8.png" alt="Shape">
    </div>
    <!-- Slider Shape End -->

    <div class="container">

        <!-- Slider Content Start -->
        <div class="slider-content">
            <h4 class="sub-title">Start your favourite course</h4>
            <h2 class="main-title">Now learning from anywhere, and build your <span>bright career.</span></h2>
            <p>It has survived not only five centuries but also the leap into electronic typesetting.</p>
            <a class="btn btn-primary btn-hover-dark" href="{{ route('register') }}">Start A Course</a>
        </div>
        <!-- Slider Content End -->

    </div>

    <!-- Slider Courses Box Start -->
    <div class="slider-courses-box">

        <img class="shape-1 animation-left" src="assets/images/shape/shape-5.png" alt="Shape">

        <div class="box-content">
            <div class="box-wrapper">
                <i class="flaticon-open-book"></i>
                <span class="count">1,235</span>
                <p>courses</p>
            </div>
        </div>

        <img class="shape-2" src="assets/images/shape/shape-6.png" alt="Shape">

    </div>
    <!-- Slider Courses Box End -->

    <!-- Slider Rating Box Start -->
    <div class="slider-rating-box">

        <div class="box-rating">
            <div class="box-wrapper">
                <span class="count">4.8 <i class="flaticon-star"></i></span>
                <p>Rating (86K)</p>
            </div>
        </div>

        <img class="shape animation-up" src="assets/images/shape/shape-7.png" alt="Shape">

    </div>
    <!-- Slider Rating Box End -->

    <!-- Slider Images Start -->
    <div class="slider-images">
        <div class="images">
            <img src="assets/images/slider/slider-1.png" alt="Slider">
        </div>
    </div>
    <!-- Slider Images End -->

    <!-- Slider Video Start -->
    <div class="slider-video">
        <img class="shape-1" src="assets/images/shape/shape-9.png" alt="Shape">

        <div class="video-play">
            <img src="assets/images/shape/shape-10.png" alt="Shape">
            <a href="https://www.youtube.com/watch?v=BRvyWfuxGuU" class="play video-popup"><i class="flaticon-play"></i></a>
        </div>
    </div>
    <!-- Slider Video End -->

</div>
<!-- Slider End -->

<!-- All Courses Start -->
<div class="section section-padding-02">
    <div class="container">

        <!-- All Courses Top Start -->
        <div class="courses-top">

            <!-- Section Title Start -->
            <div class="section-title shape-01">
                <h2 class="main-title">All <span>Courses</span> of Edule</h2>
            </div>
            <!-- Section Title End -->

            <!-- Courses Search Start -->
            <div class="courses-search">
                <form action="#">
                    <input type="text" placeholder="Search your course">
                    <button><i class="flaticon-magnifying-glass"></i></button>
                </form>
            </div>
            <!-- Courses Search End -->

        </div>
        <!-- All Courses Top End -->

        <!-- All Courses Tabs Menu Start -->
        <div class="courses-tabs-menu courses-active">
            <div class="swiper-container">
                <ul class="swiper-wrapper nav">
                    @foreach ($categories as $index => $category)
                    <li class="swiper-slide">
                        <button
                            class="{{ $loop->first ? 'active' : '' }}"
                            data-bs-toggle="tab"
                            data-bs-target="#category-{{ $category->id }}">
                            {{ $category->name }}
                        </button>
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Add Pagination -->
            <div class="swiper-button-next"><i class="icofont-rounded-right"></i></div>
            <div class="swiper-button-prev"><i class="icofont-rounded-left"></i></div>
        </div>
        <!-- All Courses Tabs Menu End -->

        <!-- All Courses tab content Start -->
        <div class="tab-content courses-tab-content">
            @foreach ($categories as $index => $category)
            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="category-{{ $category->id }}">
                <!-- All Courses Wrapper Start -->
                <div class="courses-wrapper">
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
                                            <a href="#">{{ $category->name }}</a>
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
                <!-- All Courses Wrapper End -->
            </div>
            @endforeach
        </div>
        <!-- All Courses tab content End -->


        <!-- All Courses BUtton Start -->
        <div class="courses-btn text-center">
            <a href="{{ route('lessons.index') }}" class="btn btn-secondary btn-hover-primary">Other lessons</a>
        </div>
        <!-- All Courses BUtton End -->

    </div>
</div>
<!-- All Courses End -->

<!-- Team Member's Start -->
<div class="section section-padding mt-n1">
    <div class="container">

        <!-- Section Title Start -->
        <div class="section-title shape-03 text-center">
            <h5 class="sub-title">Team Member’s</h5>
            <h2 class="main-title">Skilled <span> Instructor</span></h2>
        </div>
        <!-- Section Title End -->

        <!-- Team Wrapper Start -->
        <div class="team-wrapper">
            <div class="row row-cols-lg-5 row-cols-sm-3 row-cols-2 ">
                @foreach ($instructors as $instructor)
                <div class="col">

                    <!-- Single Team Start -->
                    <div class="single-team">
                        <div class="team-thumb">
                            <img src="{{ asset('assets/images/author/author-01.jpg') }}" alt="Author">
                        </div>
                        <div class="team-content">
                            <div class="rating">
                                <span class="count">4.9</span>
                                <i class="icofont-star"></i>
                                <span class="text">(rating)</span>
                            </div>
                            <h4 class="name">{{ $instructor->name }}</h4>
                            <span class="designation">{{ $instructor->qualification }}, Instructor</span>
                        </div>
                    </div>
                    <!-- Single Team End -->

                </div>
                @endforeach
            </div>
        </div>
        <!-- Team Wrapper End -->

    </div>
</div>
<!-- Team Member's End -->

<!-- Call to Action Start -->
<div class="section section-padding-02">
    <div class="container">

        <!-- Call to Action Wrapper Start -->
        <div class="call-to-action-wrapper">

            <img class="cat-shape-01 animation-round" src="assets/images/shape/shape-12.png" alt="Shape">
            <img class="cat-shape-02" src="assets/images/shape/shape-13.svg" alt="Shape">
            <img class="cat-shape-03 animation-round" src="assets/images/shape/shape-12.png" alt="Shape">

            <div class="row align-items-center">
                <div class="col-md-6">

                    <!-- Section Title Start -->
                    <div class="section-title shape-02">
                        <h5 class="sub-title">Become A Instructor</h5>
                        <h2 class="main-title">You can join with Edule as <span>a instructor?</span></h2>
                    </div>
                    <!-- Section Title End -->

                </div>
                <div class="col-md-6">
                    <div class="call-to-action-btn">
                        <a class="btn btn-primary btn-hover-dark" href="{{ route('home.contact') }}">Drop Information</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to Action Wrapper End -->

    </div>
</div>
<!-- Call to Action End -->

<!-- How It Work End -->
<div class="section section-padding mt-n1">
    <div class="container">

        <!-- Section Title Start -->
        <div class="section-title shape-03 text-center">
            <h5 class="sub-title">Over 1,235+ Course</h5>
            <h2 class="main-title">How It <span> Work?</span></h2>
        </div>
        <!-- Section Title End -->

        <!-- How it Work Wrapper Start -->
        <div class="how-it-work-wrapper">

            <!-- Single Work Start -->
            <div class="single-work">
                <img class="shape-1" src="assets/images/shape/shape-15.png" alt="Shape">

                <div class="work-icon">
                    <i class="flaticon-transparency"></i>
                </div>
                <div class="work-content">
                    <h3 class="title">Find Your Course</h3>
                    <p>It has survived not only centurie also leap into electronic.</p>
                </div>
            </div>
            <!-- Single Work End -->

            <!-- Single Work Start -->
            <div class="work-arrow">
                <img class="arrow" src="assets/images/shape/shape-17.png" alt="Shape">
            </div>
            <!-- Single Work End -->

            <!-- Single Work Start -->
            <div class="single-work">
                <img class="shape-2" src="assets/images/shape/shape-15.png" alt="Shape">

                <div class="work-icon">
                    <i class="flaticon-forms"></i>
                </div>
                <div class="work-content">
                    <h3 class="title">Book A Seat</h3>
                    <p>It has survived not only centurie also leap into electronic.</p>
                </div>
            </div>
            <!-- Single Work End -->

            <!-- Single Work Start -->
            <div class="work-arrow">
                <img class="arrow" src="assets/images/shape/shape-17.png" alt="Shape">
            </div>
            <!-- Single Work End -->

            <!-- Single Work Start -->
            <div class="single-work">
                <img class="shape-3" src="assets/images/shape/shape-16.png" alt="Shape">

                <div class="work-icon">
                    <i class="flaticon-badge"></i>
                </div>
                <div class="work-content">
                    <h3 class="title">Get Certificate</h3>
                    <p>It has survived not only centurie also leap into electronic.</p>
                </div>
            </div>
            <!-- Single Work End -->

        </div>

    </div>
</div>
<!-- How It Work End -->

<!-- Testimonial End -->
<div class="section section-padding-02 mt-n1">
    <div class="container">

        <!-- Section Title Start -->
        <div class="section-title shape-03 text-center">
            <h5 class="sub-title">Student Testimonial</h5>
            <h2 class="main-title">Feedback From <span> Student</span></h2>
        </div>
        <!-- Section Title End -->

        <!-- Testimonial Wrapper Start -->
        <div class="testimonial-wrapper testimonial-active">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach($testimonials as $testimonial)
                    <div class="single-testimonial swiper-slide">
                        <div class="testimonial-author">
                            <div class="author-thumb">
                                <img src="{{ asset('assets/images/author/author-03.jpg') }}" alt="Author">
                                <i class="icofont-quote-left"></i>
                            </div>

                            <span class="rating-star">
                                @php
                                $ratingPercent = ($testimonial->rating / 5) * 100;
                                @endphp
                                <span class="rating-bar" style="width: {{ $ratingPercent }}%;"></span>
                            </span>
                        </div>
                        <div class="testimonial-content">
                            <p>{{ $testimonial->message }}</p>
                            <h4 class="name">{{ $testimonial->name }}</h4>
                            <span class="designation">
                                {{ $testimonial->role ?? 'Student' }}
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <!-- Testimonial Wrapper End -->


    </div>
</div>
<!-- Testimonial End -->

<!-- Download App Start -->
<div class="section section-padding download-section mt-4">

    <div class="app-shape-1"></div>
    <div class="app-shape-2"></div>
    <div class="app-shape-3"></div>
    <div class="app-shape-4"></div>

    <div class="container">

        <!-- Download App Wrapper Start -->
        <div class="download-app-wrapper mt-n6">

            <!-- Section Title Start -->
            <div class="section-title section-title-white">
                <h5 class="sub-title">Ready to start?</h5>
                <h2 class="main-title">Here you can share your experience.</h2>
            </div>
            <!-- Section Title End -->

            <img class="shape-1 animation-right" src="assets/images/shape/shape-14.png" alt="Shape">

            <!-- Download App Button End -->
            <div class="download-app-btn">
                <ul class="app-btn">
                    <li>
                        <button type="button" class="btn btn-outline-light mb-4" data-bs-toggle="modal" data-bs-target="#testimonialModal">
                            <i class="bi bi-chat-dots"></i> Submit Testimonial
                        </button>

                        <!-- Testimonial Modal -->
                        <div class="modal fade" id="testimonialModal" tabindex="-1" aria-labelledby="testimonialModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content rounded-4 shadow-lg">
                                    <div class="modal-header bg-primary text-white">
                                        <h5 class="modal-title" id="testimonialModalLabel"><i class="bi bi-chat-quote"></i> Submit Your Testimonial</h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('front-testimonials.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="single-form mb-3 col-md-6">
                                                    <label for="name" class="form-label">Your Name</label>
                                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter your full name" required>
                                                </div>
                                                <div class="single-form mb-3 col-md-6">
                                                    <label for="role" class="form-label">Your Role</label>
                                                    <input type="text" name="role" id="role" class="form-control" placeholder="Enter your role (e.g. Student, Teacher)" required>
                                                </div>
                                                <div class="single-form mb-3 col-md-6">
                                                    <label for="photo" class="form-label">Your Photo (optional)</label>
                                                    <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
                                                </div>

                                                <div class="single-form mb-3 col-md-6">
                                                    <label class="form-label">Rating</label>
                                                    <select name="rating" class="form-select" required>
                                                        <option value="">-- Select Rating --</option>
                                                        <option value="5">⭐⭐⭐⭐⭐ (5)</option>
                                                        <option value="4">⭐⭐⭐⭐ (4)</option>
                                                        <option value="3">⭐⭐⭐ (3)</option>
                                                        <option value="2">⭐⭐ (2)</option>
                                                        <option value="1">⭐ (1)</option>
                                                    </select>
                                                </div>
                                                <div class="single-form mb-3 col-md-12">
                                                    <label for="message" class="form-label">Testimonial</label>
                                                    <textarea name="message" id="message" class="form-control" rows="4" placeholder="Write your experience..." required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success"><i class="bi bi-send"></i> Submit</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- Download App Button End -->

        </div>
        <!-- Download App Wrapper End -->

    </div>
</div>
<!-- Download App End -->

<!-- Brand Logo Start -->
<div class="section section-padding-02">
    <div class="container">

        <!-- Brand Logo Wrapper Start -->
        <div class="brand-logo-wrapper">

            <img class="shape-1" src="assets/images/shape/shape-19.png" alt="Shape">

            <img class="shape-2 animation-round" src="assets/images/shape/shape-20.png" alt="Shape">

            <!-- Section Title Start -->
            <div class="section-title shape-03">
                <h2 class="main-title">Best Supporter of <span> Edule.</span></h2>
            </div>
            <!-- Section Title End -->

            <!-- Brand Logo Start -->
            <div class="brand-logo brand-active">
                <div class="swiper-container">
                    <div class="swiper-wrapper">

                        <!-- Single Brand Start -->
                        <div class="single-brand swiper-slide">
                            <img src="assets/images/brand/brand-01.png" alt="Brand">
                        </div>
                        <!-- Single Brand End -->

                        <!-- Single Brand Start -->
                        <div class="single-brand swiper-slide">
                            <img src="assets/images/brand/brand-02.png" alt="Brand">
                        </div>
                        <!-- Single Brand End -->

                        <!-- Single Brand Start -->
                        <div class="single-brand swiper-slide">
                            <img src="assets/images/brand/brand-03.png" alt="Brand">
                        </div>
                        <!-- Single Brand End -->

                        <!-- Single Brand Start -->
                        <div class="single-brand swiper-slide">
                            <img src="assets/images/brand/brand-04.png" alt="Brand">
                        </div>
                        <!-- Single Brand End -->

                        <!-- Single Brand Start -->
                        <div class="single-brand swiper-slide">
                            <img src="assets/images/brand/brand-05.png" alt="Brand">
                        </div>
                        <!-- Single Brand End -->

                        <!-- Single Brand Start -->
                        <div class="single-brand swiper-slide">
                            <img src="assets/images/brand/brand-06.png" alt="Brand">
                        </div>
                        <!-- Single Brand End -->

                    </div>
                </div>
            </div>
            <!-- Brand Logo End -->

        </div>
        <!-- Brand Logo Wrapper End -->

    </div>
</div>
<!-- Brand Logo End -->

<!-- Blog Start -->
<div class="section section-padding mt-n1">
    <div class="container">

        <!-- Section Title Start -->
        <div class="section-title shape-03 text-center">
            <h5 class="sub-title">Latest News</h5>
            <h2 class="main-title">Educational Tips & <span> Tricks</span></h2>
        </div>
        <!-- Section Title End -->

        <!-- Blog Wrapper Start -->
        <div class="blog-wrapper">
            <div class="row">
                @foreach ($educationalTips as $tip)
                <div class="col-lg-4 col-md-6">

                    <!-- Single Blog Start -->
                    <div class="single-blog">
                        <div class="blog-image">
                            <a href="{{ route('home.educationalTips.show', $tip->slug) }}"><img src="assets/images/blog/blog-01.jpg" alt="Blog"></a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-author">
                                <div class="author">
                                    <div class="author-thumb">
                                        <a href="#"><img src="assets/images/author/author-01.jpg" alt="Author"></a>
                                    </div>
                                    <div class="author-name">
                                        <a class="name" href="#">{{ $tip->user->name }}</a>
                                    </div>
                                </div>
                                <div class="tag">
                                    <a href="#">{{ $tip->category->name }}</a>
                                </div>
                            </div>

                            <h4 class="title"><a href="{{ route('home.educationalTips.show', $tip->slug) }}">{{ $tip->title }}</a></h4>

                            <div class="blog-meta">
                                <span> <i class="icofont-calendar"></i> {{ $tip->created_at->format('d F, Y') }}</span>
                                <span> <i class="icofont-heart"></i> {{ $tip->views }}+ </span>
                            </div>

                            <a href="{{ route('home.educationalTips.show', $tip->slug) }}" class="btn btn-secondary btn-hover-primary">Read More</a>
                        </div>
                    </div>
                    <!-- Single Blog End -->

                </div>
                @endforeach
            </div>
        </div>
        <!-- Blog Wrapper End -->

    </div>
</div>
<!-- Blog End -->

@endsection