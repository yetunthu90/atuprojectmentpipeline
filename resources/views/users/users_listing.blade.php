@extends('layouts.users_header') <!-- Extend the layout -->
 
@section('title', 'Home Page') <!-- Define a title for this page -->
 
@section('content') <!-- Define the content section -->
   <!-- Carousel Start -->
   <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="asset/img/Banner1.jpg" alt="" style="height: 600px;">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Where Imagination Meets Innovation – Dive Into Studio Making</h5>
                                <h1 class="display-3 text-white animated slideInDown">Design. Build. Inspire. Start Your Journey as a Studio Maker</h1>
                                <p class="fs-5 text-white mb-4 pb-2">Master the art of studio design and creation. Build your dream space with expert guidance. Enroll now and create.</p>
                                <a href="{{ route('about') }}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="asset/img/Banner2.jpg" alt="" style="height: 600px;">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Lights, Camera, Action – Ignite Your Acting Passion</h5>
                                <h1 class="display-3 text-white animated slideInDown">Step into the Spotlight – Unleash Your Inner Actor with Our Drama Course</h1>
                                <p class="fs-5 text-white mb-4 pb-2">Learn acting, stage presence, and character development. Turn your passion into performance. Join now and start your acting journey</p>
                                <a href="{{ route('about') }}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="asset/img/Banner3.jpg" alt="" style="height: 600px;">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Chart Your Course – Find the Ideal Path to Your Future !!</h5>
                                <h1 class="display-3 text-white animated slideInDown">Choose Your Path – Discover the Perfect Course for Your Future</h1>
                                <p class="fs-5 text-white mb-4 pb-2">Explore our wide range of courses and find the one that suits your passion and career goals. Start your journey today</p>
                                <a href="{{ route('about') }}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->
    <!-- Categories Start -->
   
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Courses</h6>
                <h1 class="mb-5">Top-Rated Courses</h1>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach($courses as $course)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.{{ $loop->index + 1 }}s">
                    <div class="course-item bg-light shadow-lg rounded overflow-hidden d-flex flex-column" style="height: 100%;">
                        <div class="position-relative">
                            <img class="img-fluid w-100" src="{{ asset('asset/img/course-' . ($loop->index + 1) . '.jpg') }}" alt="{{ $course->course_name }}">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="#" class="btn btn-sm btn-primary px-4 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                                <a href="#" class="btn btn-sm btn-success px-4" style="border-radius: 0 30px 30px 0;">Join Now</a>
                            </div>
                        </div>
                        <div class="text-center p-4 d-flex flex-column flex-grow-1">
                            <h4 class="fw-bold text-primary">{{ $course->course_name }}</h4>
                            <p class="text-muted mb-2">Course ID: <span class="fw-semibold">{{ $course->course_id }}</span></p>
                            <p class="text-muted mb-2"><i class="fas fa-clock me-2"></i>{{ $course->duration }} Days</p>
                            <p class="text-muted mb-2"><i class="fas fa-users me-2"></i>Capacity: {{ $course->capacity }}</p>
                            <h5 class="text-success fw-bold text-primary">{{ '€' . number_format($course->price, 2) }}</h5>
                            <p class="text-dark mt-3 flex-grow-1">{{ Str::limit($course->description, 100, '...') }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Courses End -->
 
 
   
 
 

    <!-- Testimonial End -->
      <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="asset/lib/wow/wow.min.js"></script>
<script src="asset/lib/easing/easing.min.js"></script>
<script src="asset/lib/waypoints/waypoints.min.js"></script>
<script src="asset/lib/owlcarousel/owl.carousel.min.js"></script>
 
<!-- Template Javascript -->
<script src="asset/js/main.js"></script>
@endsection
 