{{-- Show the course --}}
@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/pages/show.css') }}">

<div class="course-show-wrapper">
    <h2 class="course-title">{{ $course->title }}</h2>

    <div class="course-card">
        {{-- VIDEO PREVIEW --}}
        @if ($course->video_url)
            <div class="course-video-wrapper">
                <video class="course-video" controls>
                    <source src="{{ $course->video_url }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        @endif

        <p class="course-description">{{ $course->description }}</p>
        <p class="course-price">Price: ${{ number_format($course->price / 100, 2) }}</p>

        <form action="{{ route('checkout', $course->id) }}" method="GET">
            <button type="submit" class="buy-button">Buy Now</button>
        </form>
    </div>
</div>

@endsection
