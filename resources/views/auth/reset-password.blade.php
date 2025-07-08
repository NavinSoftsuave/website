@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">

<div class="auth-container">
    <h2>Reset Password</h2>

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email', $request->email) }}" required>
        @error('email') <div class="error">{{ $message }}</div> @enderror

        <label for="password">New Password</label>
        <input type="password" name="password" id="password" required>
        @error('password') <div class="error">{{ $message }}</div> @enderror

        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" required>

        <button type="submit">Reset Password</button>
    </form>
</div>
@endsection
