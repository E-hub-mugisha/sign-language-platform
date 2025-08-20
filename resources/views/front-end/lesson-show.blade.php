@extends('layouts.guest')

@section('content')

<!-- Page Banner Start -->
<div class="section page-banner">

    <div class="container">
        <!-- Page Banner Start -->
        <div class="page-banner-content">
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Lesson Details</li>
            </ul>
            <h2 class="title">Lesson <span> {{ $lesson->title }}</span></h2>
        </div>
        <!-- Page Banner End -->
    </div>

</div>
<!-- Page Banner End -->

<!-- Courses Start -->
<div class="section section-padding mt-n10">
    <div class="container">
        <div class="row gx-10">
            <div class="col-lg-8">

                <!-- Courses Details Start -->
                <div class="courses-details">

                    <div class="courses-details-images">
                        <img src="{{ asset('assets/images/courses/courses-details.jpg') }}" alt="Courses Details">
                        <span class="tags">{{ $lesson->category->name }}</span>

                        <div class="courses-play">
                            <img src="{{ asset('assets/images/courses/circle-shape.png') }}" alt="Play">
                            <a class="play video-popup" href="{{ $lesson->video_url }}"><i class="flaticon-play"></i></a>
                        </div>
                    </div>

                    <h2 class="title">{{ $lesson->title }}</h2>

                    <div class="courses-details-admin">
                        <div class="admin-author">
                            <div class="author-thumb">
                                <img src="{{ asset('assets/images/author/author-01.jpg') }}" alt="Author">
                            </div>
                            <div class="author-content">
                                <a class="name" href="#">{{ $lesson->tutor->name }}</a>
                                <span class="Enroll">{{ $lesson->enrolled_students }} Enrolled Students</span>
                            </div>
                        </div>
                        <div class="admin-rating">
                            <span class="rating-count">4.9</span>
                            <span class="rating-star">
                                <span class="rating-bar" style="width: 80%;"></span>
                            </span>
                            <span class="rating-text">(5,764 Rating)</span>
                        </div>
                    </div>

                    <!-- Courses Details Tab Start -->
                    <div class="courses-details-tab">

                        <!-- Details Tab Menu Start -->
                        <div class="details-tab-menu">
                            <ul class="nav justify-content-center">
                                <li><button class="active" data-bs-toggle="tab" data-bs-target="#description">Description</button></li>
                                <li><button data-bs-toggle="tab" data-bs-target="#instructors">Instructors</button></li>
                                <li><button data-bs-toggle="tab" data-bs-target="#reviews">Reviews</button></li>
                            </ul>
                        </div>
                        <!-- Details Tab Menu End -->

                        <!-- Details Tab Content Start -->
                        <div class="details-tab-content">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="description">

                                    <!-- Tab Description Start -->
                                    <div class="tab-description">
                                        <div class="description-wrapper">
                                            <h3 class="tab-title">Description:</h3>
                                            <p>{{ $lesson->description }}</p>
                                        </div>
                                    </div>
                                    <!-- Tab Description End -->

                                </div>
                                <div class="tab-pane fade" id="instructors">

                                    <!-- Tab Instructors Start -->
                                    <div class="tab-instructors">
                                        <h3 class="tab-title">Lesson Instructor:</h3>

                                        <div class="row">
                                            <div class="col-md-3 col-6">
                                                <!-- Single Team Start -->
                                                <div class="single-team">
                                                    <div class="team-thumb">
                                                        <img src="{{ asset('assets/images/author/author-04.jpg') }}" alt="Author">
                                                    </div>
                                                    <div class="team-content">
                                                        <div class="rating">
                                                            <span class="count">4.9</span>
                                                            <i class="icofont-star"></i>
                                                            <span class="text">(rating)</span>
                                                        </div>
                                                        <h4 class="name">{{ $lesson->tutor->name }}</h4>
                                                        <span class="designation">BBS, Instructor</span>
                                                    </div>
                                                </div>
                                                <!-- Single Team End -->
                                            </div>
                                        </div>

                                        <div class="row gx-10">
                                            <div class="col-lg-6">
                                                <div class="tab-rating-content">
                                                    <h3 class="tab-title">Rating:</h3>
                                                    <p>Lorem Ipsum is simply dummy text of printing and typesetting industry. Lorem Ipsum has been the i dustry's standard dummy text ever since the 1500 unknown printer took a galley of type.</p>
                                                    <p>Lorem Ipsum is simply dummy text of printing and typesetting industry text ever since</p>
                                                    <p>Lorem Ipsum is simply dummy text of printing and dustry's standard dummy text ever since the 1500 unknown printer took a galley of type.</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="tab-rating-box">
                                                    <span class="count">4.8 <i class="icofont-star"></i></span>
                                                    <p>Rating (86K+)</p>

                                                    <div class="rating-box-wrapper">
                                                        <div class="single-rating">
                                                            <span class="rating-star">
                                                                <span class="rating-bar" style="width: 100%;"></span>
                                                            </span>
                                                            <div class="rating-progress-bar">
                                                                <div class="rating-line" style="width: 75%;"></div>
                                                            </div>
                                                        </div>

                                                        <div class="single-rating">
                                                            <span class="rating-star">
                                                                <span class="rating-bar" style="width: 80%;"></span>
                                                            </span>
                                                            <div class="rating-progress-bar">
                                                                <div class="rating-line" style="width: 90%;"></div>
                                                            </div>
                                                        </div>

                                                        <div class="single-rating">
                                                            <span class="rating-star">
                                                                <span class="rating-bar" style="width: 60%;"></span>
                                                            </span>
                                                            <div class="rating-progress-bar">
                                                                <div class="rating-line" style="width: 500%;"></div>
                                                            </div>
                                                        </div>

                                                        <div class="single-rating">
                                                            <span class="rating-star">
                                                                <span class="rating-bar" style="width: 40%;"></span>
                                                            </span>
                                                            <div class="rating-progress-bar">
                                                                <div class="rating-line" style="width: 80%;"></div>
                                                            </div>
                                                        </div>

                                                        <div class="single-rating">
                                                            <span class="rating-star">
                                                                <span class="rating-bar" style="width: 20%;"></span>
                                                            </span>
                                                            <div class="rating-progress-bar">
                                                                <div class="rating-line" style="width: 40%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Tab Instructors End -->

                                </div>
                                <div class="tab-pane fade" id="reviews">

                                    <!-- Tab Reviews Start -->
                                    <div class="tab-reviews">
                                        <h3 class="tab-title">Lesson Reviews:</h3>

                                        <div class="reviews-wrapper reviews-active">
                                            <div class="swiper-container">
                                                <div class="swiper-wrapper">
                                                    @forelse($lesson->reviews as $review)
                                                    <div class="single-review swiper-slide">
                                                        <div class="review-author">
                                                            <div class="author-thumb">
                                                                <img src="{{ $review->user->profile_photo_url ?? asset('assets/images/author/default.jpg') }}" alt="{{ $review->user->name }}">
                                                                <i class="icofont-quote-left"></i>
                                                            </div>
                                                            <div class="author-content">
                                                                <h4 class="name">{{ $review->user->name }}</h4>
                                                                <span class="designation">{{ $review->user->email }}</span>
                                                                <span class="rating-star">
                                                                    <span class="rating-bar" style="width: {{ ($review->rating / 5) * 100 }}%;"></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <p>{{ $review->comment }}</p>
                                                    </div>
                                                    @empty
                                                    <p>No reviews yet. Be the first to review this lesson!</p>
                                                    @endforelse
                                                </div>

                                                <!-- Add Pagination -->
                                                <div class="swiper-pagination"></div>
                                            </div>
                                        </div>

                                        <div class="reviews-btn">
                                            <button type="button" class="btn btn-primary btn-hover-dark" data-bs-toggle="modal" data-bs-target="#reviewsModal">Write A Review</button>
                                        </div>

                                        <!-- Reviews Form Modal Start -->
                                        <div class="modal fade" id="reviewsModal">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Add a Review</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                    <!-- Reviews Form Start -->
                                                    <div class="modal-body reviews-form">
                                                        <form action="{{ route('lesson-reviews.store') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <!-- Rating -->
                                                                    <div class="reviews-rating">
                                                                        <label>Rating</label>
                                                                        <ul id="rating" class="rating">
                                                                            @for($i = 1; $i <= 5; $i++)
                                                                                <li class="star" data-value="{{ $i }}">
                                                                                <i class="icofont-star"></i>
                                                                                </li>
                                                                                @endfor
                                                                        </ul>
                                                                        <input type="hidden" name="rating" id="rating-value" value="0">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="single-form">
                                                                        <textarea name="comment" placeholder="Write your comments here"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="single-form">
                                                                        <button class="btn btn-primary btn-hover-dark">Submit Review</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- Reviews Form End -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Reviews Form Modal End -->

                                    </div>
                                    <!-- Tab Reviews End -->

                                </div>
                            </div>
                        </div>
                        <!-- Details Tab Content End -->

                    </div>
                    <!-- Courses Details Tab End -->

                </div>
                <!-- Courses Details End -->

            </div>
            <div class="col-lg-4">
                <!-- Courses Details Sidebar Start -->
                <div class="sidebar">

                    <!-- Sidebar Widget Information Start -->
                    <div class="sidebar-widget widget-information">
                        <div class="info-price">
                            <span class="price">{{ $lesson->is_active ? 'Active' : 'Inactive' }}</span>
                        </div>
                        <div class="info-list">
                            <ul>
                                <li><i class="icofont-man-in-glasses"></i> <strong>Instructor</strong> <span>{{ $lesson->tutor->name }}</span></li>
                                <li><i class="icofont-clock-time"></i> <strong>Duration</strong> <span>30 mins</span></li>
                                <li><i class="icofont-bars"></i> <strong>Level</strong> <span>Secondary</span></li>
                                <li><i class="icofont-book-alt"></i> <strong>Language</strong> <span>{{ $lesson->language }}</span></li>
                            </ul>
                        </div>
                        <div class="info-btn">
                            <!-- Enroll Now Button -->
                            @php
                            $enrolled = auth()->check()
                            ? $lesson->enrollments->where('user_id', auth()->id())->first()
                            : null;
                            @endphp

                            @if($enrolled)
                            <a href="{{ route('lessons.enrolled', $lesson->id) }}" class="btn btn-primary btn-hover-dark">
                                View Lesson
                            </a>
                            @else
                            <a href="#" class="btn btn-primary btn-hover-dark" data-bs-toggle="modal" data-bs-target="#enrollModal{{ $lesson->id }}">
                                Enroll Now
                            </a>

                            <!-- Enroll Modal -->
                            <div class="modal fade" id="enrollModal{{ $lesson->id }}" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Enroll in {{ $lesson->title }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Do you want to enroll in this lesson?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('lessons.enroll', $lesson->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">Yes, Enroll</button>
                                            </form>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif


                        </div>
                    </div>
                    <!-- Sidebar Widget Information End -->

                    <!-- Sidebar Widget Share Start -->
                    <div class="sidebar-widget">
                        <h4 class="widget-title">Share Course:</h4>

                        <ul class="social">
                            <li><a href="#"><i class="flaticon-facebook"></i></a></li>
                            <li><a href="#"><i class="flaticon-linkedin"></i></a></li>
                            <li><a href="#"><i class="flaticon-twitter"></i></a></li>
                            <li><a href="#"><i class="flaticon-skype"></i></a></li>
                            <li><a href="#"><i class="flaticon-instagram"></i></a></li>
                        </ul>
                    </div>
                    <!-- Sidebar Widget Share End -->

                </div>
                <!-- Courses Details Sidebar End -->
            </div>
        </div>
    </div>
</div>
<!-- Courses End -->

<script>
    document.querySelectorAll('#rating .star').forEach(star => {
        star.addEventListener('click', function() {
            let value = this.getAttribute('data-value');
            document.getElementById('rating-value').value = value;

            // Highlight stars
            document.querySelectorAll('#rating .star').forEach(s => {
                s.classList.remove('selected');
                if (s.getAttribute('data-value') <= value) {
                    s.classList.add('selected');
                }
            });
        });
    });
</script>

<style>
    .rating .star i {
        color: #ccc;
        cursor: pointer;
    }

    .rating .star.selected i {
        color: gold;
    }
</style>

@endsection