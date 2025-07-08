@extends('layouts.app')

@section('content')
    {{-- Link to the category courses custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/pages/category.css') }}">

    <div class="category-header bg-white shadow mb-6">
        <div class="container">
            <h2 class="category-title">
                {{ $categoryName }} Courses
            </h2>
        </div>
    </div>

    <div class="container">
        <div class="courses-container">
            @forelse ($courses as $course)
                <a href="{{ route('courses.show', $course->id) }}">
                    <div class="course-card">
                        <h3 class="course-title">{{ $course->title }}</h3>
                        <p class="course-description">{{ $course->description }}</p>
                        <p class="course-price">
                            Price: ${{ number_format($course->price / 100, 2) }}
                        </p>
                    </div>
                </a>
            @empty
                <p class="no-courses">No {{ strtolower($categoryName) }} courses available.</p>
            @endforelse
        </div>
    </div>
     <div class="pagination-wrapper">
    {{ $courses->links() }}
    </div>
@endsection
