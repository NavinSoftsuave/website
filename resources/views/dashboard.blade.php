@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

<div class="dashboard-wrapper">
    <div class="dashboard-container">
        <!-- Left: Platform Info -->
        <div class="dashboard-text">
            <h2>Welcome to Tree Courses</h2>
            <p>
                Tree Courses is a modern e-learning platform offering a wide range of online courses in technology,
                business, personal development, and more. Subscribe to individual courses and start learning at your own pace.
                Enjoy high-quality video content, expert instructors, and a personalized learning experience.
            </p>
            <p>
                Join thousands of learners and take your skills to the next level with our curated course library.
            </p>
            <div class="dashboard-images">
                <img src="{{ asset('images/img1.jpg') }}" alt="Learning 1">
                <img src="{{ asset('images/img2.jpg') }}" alt="Learning 2">
                <img src="{{ asset('images/img3.jpeg') }}" alt="Learning 3">
                <p>
                Tree Courses is a modern e-learning platform offering a wide range of online courses in technology,
                business, personal development, and more. Subscribe to individual courses and start learning at your own pace.
                Enjoy high-quality video content, expert instructors, and a personalized learning experience.
                </p>
                <img src="{{ asset('images/img1.jpg') }}" alt="Learning 1">
                <img src="{{ asset('images/img2.jpg') }}" alt="Learning 2">
                <img src="{{ asset('images/img3.jpeg') }}" alt="Learning 3">
                <p>
                Tree Courses is a modern e-learning platform offering a wide range of online courses in technology,
                business, personal development, and more. Subscribe to individual courses and start learning at your own pace.
                Enjoy high-quality video content, expert instructors, and a personalized learning experience.
                </p>
                <img src="{{ asset('images/img1.jpg') }}" alt="Learning 1">
                <img src="{{ asset('images/img2.jpg') }}" alt="Learning 2">
                <img src="{{ asset('images/img3.jpeg') }}" alt="Learning 3">
            </div>
        </div>

        <!-- Right: Media Section (Video + Images) -->
        <div class="dashboard-media">
            <div class="dashboard-video">
                <video autoplay loop muted playsinline>
                    <source src="{{ asset('videos/intro.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
           
        </div>
    </div>
</div>
@endsection
