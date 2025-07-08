@extends('layouts.app')

@section('content')
    {{-- Link to the custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/pages/allCourses.css') }}">

    <div >
        <form method="GET" action="{{ route('courses.allcourses') }}" class="course-search-form">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search courses..."
                class="course-search-input"
            >
            <button type="submit" class="course-search-button">
                Search
            </button>
        </form>

        @if(request('search'))
            <p class="search-note">
                Showing results for "<strong>{{ request('search') }}</strong>"
            </p>
        @endif

        <div class="courses-container">

        @forelse ($courses as $course)
            <a href="{{ route('courses.show', $course->id) }}" >
                <div class="course-card">
                <h3 class="course-title">{{ $course->title }}</h3>
                <p class="course-description">{{ $course->description }}</p>
                <p class="course-price">Price: ${{ number_format($course->price / 100, 2) }}</p>
                </div>
            </a>
        @empty
            <p>No courses available.</p>
        @endforelse
        </div>
    </div>
    <div class="pagination-wrapper">
    {{ $courses->links() }}
    </div>

@endsection
