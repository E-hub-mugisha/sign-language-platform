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
            <h2 class="title"><span>Instructors</span></h2>
        </div>
        <!-- Page Banner End -->
    </div>

</div>
<!-- Page Banner End -->

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

@endsection