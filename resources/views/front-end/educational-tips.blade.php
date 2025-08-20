@extends('layouts.guest')

@section('content')

<!-- Page Banner Start -->
<div class="section page-banner">

    <div class="container">
        <!-- Page Banner Start -->
        <div class="page-banner-content">
            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Educational</li>
            </ul>
            <h2 class="title">Our <span>Educational Tips</span></h2>
        </div>
        <!-- Page Banner End -->
    </div>

</div>
<!-- Page Banner End -->

<!-- Blog Start -->
<div class="section section-padding mt-n10">
    <div class="container">

        <!-- Blog Wrapper Start -->
        <div class="blog-wrapper">
            <div class="row">
                @foreach ($educationTips as $tip)
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

        <!-- Page Pagination End -->
        <div class="page-pagination">
            <ul class="pagination justify-content-center">
                <li><a href="#"><i class="icofont-rounded-left"></i></a></li>
                <li><a class="active" href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#"><i class="icofont-rounded-right"></i></a></li>
            </ul>
        </div>
        <!-- Page Pagination End -->

    </div>
</div>
<!-- Blog End -->

@endsection