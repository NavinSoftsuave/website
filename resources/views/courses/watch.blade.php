@extends('layouts.app')

@section('content')

{{-- Link to the custom CSS --}}
<link rel="stylesheet" href="{{ asset('css/pages/watch.css') }}">

<div class="watch-container">
    <h2 class="course-title">{{ $course->title }}</h2>

    <div class="video-wrapper">
        <iframe
            class="video-frame"
            src="https://www.youtube.com/embed/{{ \Illuminate\Support\Str::after($course->video_url, 'v=') }}"
            frameborder="0"
            allowfullscreen>
        </iframe>
    </div>

    <p class="course-description">{{ $course->description }}</p>

    {{-- Unsubscribe Form --}}
    <form method="POST" action="{{ route('courses.unsubscribe', $course->id) }}" onsubmit="return confirm('Are you sure you want to unsubscribe from this course?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="danger-button">Unsubscribe</button>
    </form>
</div>

@endsection
