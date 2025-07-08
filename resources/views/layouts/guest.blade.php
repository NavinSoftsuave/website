<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}"> <!-- optional external CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .auth-wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding-top: 2rem;
        }
        .logo {
            width: 80px;
            height: 80px;
        }
        .auth-card {
            width: 100%;
            max-width: 450px;
            margin-top: 1.5rem;
            padding: 2rem;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="auth-wrapper">
        <a href="/">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
        </a>

        <div class="auth-card">
            @yield('content') {{-- This will render your login/register form --}}
        </div>
    </div>
</body>
</html>
