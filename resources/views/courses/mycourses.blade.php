@extends('layouts.app')

@section('content')

{{-- Link to external CSS --}}
<link rel="stylesheet" href="{{ asset('css/pages/mycourses.css') }}">

<div class="mycourses-wrapper">
    <h2 class="mycourses-title">
        {{ __('My Courses') }}
    </h2>

    @forelse ($courses as $course)
        @if ($course->video_url)
            <a href="{{ route('courses.watch', $course->id) }}" class="mycourse-link">
                <div class="mycourse-card">
                    <h3 class="mycourse-title">{{ $course->title }}</h3>
                    <p class="mycourse-description">{{ $course->description }}</p>
                </div>
            </a>
        @else
            <div class="mycourse-card">
                <h3 class="mycourse-title">{{ $course->title }}</h3>
                <p class="mycourse-description">{{ $course->description }}</p>
                <p class="mycourse-warning">Video not available</p>
            </div>
        @endif
    @empty
        <p class="no-courses">You haven’t subscribed to any courses yet.</p>
    @endforelse
</div>
<div class="pagination-wrapper">
    {{ $courses->links() }}
</div>

@endsection
