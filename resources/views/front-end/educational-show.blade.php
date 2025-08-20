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
            <h2 class="title"><span>{{ $tip->title }}</span></h2>
        </div>
        <!-- Page Banner End -->
    </div>

</div>
<!-- Page Banner End -->

<!-- Blog Details Start -->
<div class="section section-padding mt-n10">
    <div class="container">

        <div class="row gx-10">
            <div class="col-lg-8">

                <!-- Blog Details Wrapper Start -->
                <div class="blog-details-wrapper">
                    <div class="blog-details-admin-meta">
                        <div class="author">
                            <div class="author-thumb">
                                <a href="#"><img src="assets/images/author/author-01.jpg" alt="Author"></a>
                            </div>
                            <div class="author-name">
                                <a class="name" href="#">{{ $tip->user->name }}</a>
                            </div>
                        </div>
                        <div class="blog-meta">
                            <span> <i class="icofont-calendar"></i> {{ $tip->created_at->format('d F, Y') }}</span>
                            <span> <i class="icofont-heart"></i> {{ $tip->views }}+ </span>
                            <span class="tag"><a href="#">{{ $tip->category->name }}</a></span>
                        </div>
                    </div>

                    <h2 class="title">{{ $tip->title }}</h2>

                    <div class="blog-details-description">
                        <p>{{ $tip->description }}</p>
                    </div>

                    <div class="blog-details-label">
                        <h4 class="label">Tags:</h4>
                        <ul class="tag-list">
                            <li><a href="#">{{ $tip->tag }}</a></li>
                        </ul>
                    </div>

                    <div class="blog-details-label">
                        <h4 class="label">Share:</h4>
                        <ul class="social">
                            <li><a href="#"><i class="flaticon-facebook"></i></a></li>
                            <li><a href="#"><i class="flaticon-linkedin"></i></a></li>
                            <li><a href="#"><i class="flaticon-twitter"></i></a></li>
                            <li><a href="#"><i class="flaticon-skype"></i></a></li>
                            <li><a href="#"><i class="flaticon-instagram"></i></a></li>
                        </ul>
                    </div>

                </div>
                <!-- Blog Details Wrapper End -->

                <!-- Blog Details Comment End -->
                <div class="blog-details-comment">
                    <div class="comment-wrapper">
                        <h3 class="title">Comments (03)</h3>

                        <ul class="comment-items">
                            <li>
                                <!-- Single Comment Start -->
                                <div class="single-comment">
                                    <div class="comment-author">
                                        <div class="author-thumb">
                                            <img src="assets/images/author/author-01.jpg" alt="Author">
                                        </div>
                                        <div class="author-content">
                                            <h4 class="name">Sara Alexander</h4>
                                            <div class="meta">
                                                <span class="designation">Product Designer, USA</span>
                                                <span class="time">35 minutes ago</span>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Lorem Ipsum has been the industry's standard dummy text since the 1500 when unknown printer took a galley type and scrambled to make type specimen’s book has survived not five centuries but also the leap into electronic type and book.</p>
                                    <a href="#" class="reply"> <i class="icofont-reply"></i> Reply</a>
                                </div>
                                <!-- Single Comment End -->

                                <ul class="comment-reply">
                                    <li>
                                        <!-- Single Comment Start -->
                                        <div class="single-comment">
                                            <div class="comment-author">
                                                <div class="author-thumb">
                                                    <img src="assets/images/author/author-03.jpg" alt="Author">
                                                </div>
                                                <div class="author-content">
                                                    <h4 class="name">Robert Morgan</h4>
                                                    <div class="meta">
                                                        <span class="designation">Product Designer, USA</span>
                                                        <span class="time">35 minutes ago</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <p>Lorem Ipsum has been the industry's standard dumm text since the 1500 when printer took a galley type and scrambled to make type specimen book survived centuries but also the electronic type and book.</p>
                                            <a href="#" class="reply"> <i class="icofont-reply"></i> Reply</a>
                                        </div>
                                        <!-- Single Comment End -->
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <!-- Single Comment Start -->
                                <div class="single-comment">
                                    <div class="comment-author">
                                        <div class="author-thumb">
                                            <img src="assets/images/author/author-07.jpg" alt="Author">
                                        </div>
                                        <div class="author-content">
                                            <h4 class="name">Rochelle Hunt</h4>
                                            <div class="meta">
                                                <span class="designation">Product Designer, USA</span>
                                                <span class="time">35 minutes ago</span>
                                            </div>
                                        </div>
                                    </div>
                                    <p>Lorem Ipsum has been the industry's standard dummy text since the 1500 when unknown printer took a galley type and scrambled to make type specimen’s book has survived not five centuries but also the leap into electronic type and book.</p>
                                    <a href="#" class="reply"> <i class="icofont-reply"></i> Reply</a>
                                </div>
                                <!-- Single Comment End -->
                            </li>
                        </ul>
                    </div>
                    <div class="comment-form">
                        <h3 class="title">Leave a comment</h3>

                        <!-- Form Wrapper Start -->
                        <div class="form-wrapper">
                            <form action="#">
                                <div class="row">
                                    <div class="col-md-6">
                                        <!-- Form Wrapper Start -->
                                        <div class="single-form">
                                            <input type="text" placeholder="Name">
                                        </div>
                                        <!-- Form Wrapper End -->
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Form Wrapper Start -->
                                        <div class="single-form">
                                            <input type="email" placeholder="Email">
                                        </div>
                                        <!-- Form Wrapper End -->
                                    </div>
                                    <div class="col-md-12">
                                        <!-- Form Wrapper Start -->
                                        <div class="single-form">
                                            <textarea placeholder="Massage"></textarea>
                                        </div>
                                        <!-- Form Wrapper End -->
                                    </div>
                                    <div class="col-md-12">
                                        <!-- Form Wrapper Start -->
                                        <div class="single-form text-center">
                                            <button class="btn btn-primary btn-hover-dark">Submit Now</button>
                                        </div>
                                        <!-- Form Wrapper End -->
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Form Wrapper End -->
                    </div>
                </div>
                <!-- Blog Details Comment End -->

            </div>
            <div class="col-lg-4">

                <!-- Blog Sidebar Start -->
                <div class="sidebar">

                    <!-- Sidebar Widget Search Start -->
                    <div class="sidebar-widget widget-search">
                        <form action="#">
                            <input type="text" placeholder="Search here">
                            <button><i class="icofont-search-1"></i></button>
                        </form>
                    </div>
                    <!-- Sidebar Widget Search End -->

                    <!-- Sidebar Widget Category Start -->
                    <div class="sidebar-widget">
                        <h4 class="widget-title">Post Category</h4>

                        <div class="widget-category">
                            <ul class="category-list">
                                <li><a href="#">UI/UX Design <span>(16)</span></a></li>
                                <li><a href="#">Creative Writing <span>(03)</span></a></li>
                                <li><a href="#">Graphic Design <span>(08)</span></a></li>
                                <li><a href="#">Fine Arts <span>(18)</span></a></li>
                                <li><a href="#">Business Analytics <span>(02)</span></a></li>
                                <li><a href="#">Marketing <span>(14)</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Sidebar Widget Category End -->

                    <!-- Sidebar Widget Post Start -->
                    <div class="sidebar-widget">
                        <h4 class="widget-title">Recent Post</h4>

                        <div class="widget-post">
                            <ul class="post-items">
                                <li>
                                    <!-- Sidebar Widget Post Start -->
                                    <div class="single-post">
                                        <div class="post-thumb">
                                            <a href="blog-details-left-sidebar.html"><img src="assets/images/blog/blog-01.jpg" alt="Post"></a>
                                        </div>
                                        <div class="post-content">
                                            <h5 class="title"><a href="blog-details-left-sidebar.html">Create Amazing Color Schemes Design</a></h5>
                                            <span class="date"><i class="icofont-calendar"></i> 21 March, 2021</span>
                                        </div>
                                    </div>
                                    <!-- Sidebar Widget Post End -->
                                </li>
                                <li>
                                    <!-- Sidebar Widget Post Start -->
                                    <div class="single-post">
                                        <div class="post-thumb">
                                            <a href="blog-details-left-sidebar.html"><img src="assets/images/blog/blog-02.jpg" alt="Post"></a>
                                        </div>
                                        <div class="post-content">
                                            <h5 class="title"><a href="blog-details-left-sidebar.html">Data Science Machine Learning with Python</a></h5>
                                            <span class="date"><i class="icofont-calendar"></i> 21 March, 2021</span>
                                        </div>
                                    </div>
                                    <!-- Sidebar Widget Post End -->
                                </li>
                                <li>
                                    <!-- Sidebar Widget Post Start -->
                                    <div class="single-post">
                                        <div class="post-thumb">
                                            <a href="blog-details-left-sidebar.html"><img src="assets/images/blog/blog-03.jpg" alt="Post"></a>
                                        </div>
                                        <div class="post-content">
                                            <h5 class="title"><a href="blog-details-left-sidebar.html">Leadership: Strategies for Business</a></h5>
                                            <span class="date"><i class="icofont-calendar"></i> 21 March, 2021</span>
                                        </div>
                                    </div>
                                    <!-- Sidebar Widget Post End -->
                                </li>
                                <li>
                                    <!-- Sidebar Widget Post Start -->
                                    <div class="single-post">
                                        <div class="post-thumb">
                                            <a href="blog-details-left-sidebar.html"><img src="assets/images/blog/blog-04.jpg" alt="Post"></a>
                                        </div>
                                        <div class="post-content">
                                            <h5 class="title"><a href="blog-details-left-sidebar.html">Illustrating Badges & Geometric Shapes</a></h5>
                                            <span class="date"><i class="icofont-calendar"></i> 21 March, 2021</span>
                                        </div>
                                    </div>
                                    <!-- Sidebar Widget Post End -->
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Sidebar Widget Post End -->

                    <!-- Sidebar Widget Tags Start -->
                    <div class="sidebar-widget">
                        <h4 class="widget-title">Popular Tags</h4>

                        <div class="widget-tags">
                            <ul class="tags-list">
                                <li><a href="#">Design</a></li>
                                <li><a href="#">Education</a></li>
                                <li><a href="#">Education</a></li>
                                <li><a href="#">Design</a></li>
                                <li><a href="#">Design</a></li>
                                <li><a href="#">Education</a></li>
                                <li><a href="#">Education</a></li>
                                <li><a href="#">Design</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Sidebar Widget Tags End -->

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
                <!-- Blog Sidebar End -->

            </div>
        </div>

    </div>
</div>
<!-- Blog Details End -->

@endsection