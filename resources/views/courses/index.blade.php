@extends('layouts.app')

@section('content')
    {{-- Link external CSS --}}
    <link rel="stylesheet" href="{{ asset('css/pages/index.css') }}">

    <div class="courses-header">
        
            <a href="{{ route('courses.mycourses') }}" class="{{ request()->routeIs('courses.mycourses') ? 'active' : '' }}">
                My Courses
            </a>

            <div class="dropdown">
                <button class="dropdown-button">Category ▼</button>
                <div class="dropdown-content">
                    <a href="{{ route('courses.category', 'academic') }}">Academic Courses</a>
                    <a href="{{ route('courses.category', 'business') }}">Business & Marketing</a>
                    <a href="{{ route('courses.category', 'design') }}">Design & Creativity</a>
                    <a href="{{ route('courses.category', 'language') }}">Language Learning</a>
                    <a href="{{ route('courses.category', 'personal') }}">Personal Development</a>
                    <a href="{{ route('courses.category', 'technology') }}">Technology & Programming</a>
                </div>
            </div>

            <a href="{{ route('courses.allcourses') }}" class="{{ request()->routeIs('courses.allcourses') ? 'active' : '' }}">
                All Courses
            </a>
        
    </div>

    <div class="courses-container">
        @forelse ($courses as $course)
            <div class="course-card">
                <h3>{{ $course->title }}</h3>
                <p class="description">{{ $course->description }}</p>
                <p class="price">Price: ${{ number_format($course->price / 100, 2) }}</p>
                <a href="{{ route('checkout', $course->id) }}" class="buy-now">Buy Now</a>
            </div>
        @empty
            <p class="no-courses">No courses available.</p>
        @endforelse
    </div>
    <div class="pagination-wrapper">
    {{ $courses->links() }}
    </div>

@endsection
