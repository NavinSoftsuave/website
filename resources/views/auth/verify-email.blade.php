@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/auth.css') }}">

@section('content')
<div class="auth-container">
    <h2>Verify Email</h2>

    @if (session('status') == 'verification-link-sent')
        <div class="alert">
            A new verification link has been sent to your email address.
        </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit">Resend Verification Email</button>
    </form>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>
@endsection
