@extends('layouts.app') <!-- Extend the layout -->

@section('title', 'Contact Us Page') <!-- Define a title for this page -->


@section('content') <!-- Define the content section -->
 <!-- Contact Start -->
 <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Welcome to Our Team!</h6>
                <h1 class="mb-5">Let’s Get You Started – Please Complete the Details Below</h1>
            </div>
            <div class="row g-12">
                <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    <form method="POST" action="{{ route('form.submit') }}">
                    @method('POST')
                    @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="email" placeholder="Your Email" name="email"  required>
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="phone_number" placeholder="Your Phone Number" name="phone_number"  required>
                                    <label for="phone_number">Phone Number</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select custom-select" id="course" name="course" required>
                                    </select>
                                    </select>
                                    <label for="course">Course</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" class="form-control" id="phone_number" placeholder="Your Phone Number" name="phone_number"  required>
                                    <label for="phone_number">Course Start Date</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="special_request " placeholder="nice-to-have" name="phone_number"  required>
                                    <label for="special_request">Special Requests</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" id="course" name="course" required>
                                        <option value="course1">Payment Method</option>
                                        <option value="course2">Course 2</option>
                                        <option value="course3">Course 3</option>
                                    </select>
                                    <label for="course">Payment Method</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="contact_method" placeholder="nice-to-have" name="phone_number"  required>
                                    <label for="contact_method">Preferred Contact Method</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message"  name="message" style="height: 150px" required></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
    @endsection