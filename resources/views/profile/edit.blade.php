@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">

    <div class="profile-header">
        <h2>Profile</h2>
    </div>

    <div class="profile-wrapper">
        <div class="profile-section">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="profile-section">
            @include('profile.partials.update-password-form')
        </div>

        <div class="profile-section">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
@endsection
