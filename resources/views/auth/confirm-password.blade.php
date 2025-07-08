@extends('layouts.app')

@section('content')
<div class="auth-container">
    <h2>Confirm Password</h2>

    <p>This is a secure area. Please confirm your password before continuing.</p>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        @error('password') <div class="error">{{ $message }}</div> @enderror

        <button type="submit">Confirm</button>
    </form>
</div>
@endsection
