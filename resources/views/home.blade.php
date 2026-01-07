<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ImkerHUB</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-yellow-200 text-gray-900 antialiased">
<div class="min-h-screen flex flex-col items-center justify-center gap-10">
    <img
        src="/logo.png"
        alt="ImkerHUB logo"
    />

    <h1 class="text-4xl font-bold">
        Welcome!
    </h1>

    <p>Dit is het platform waar imkers en klanten elkaar vinden.</p>
    <div>
        @if (Route::has('login'))
        <div class="flex gap-4">
            @auth
            <a href="{{ url('/dashboard') }}"
               class="px-4 py-2 rounded bg-indigo-600 text-white">
                Dashboard
            </a>
            @else
            <a href="{{ route('login') }}"
               class="px-4 py-2 rounded bg-orange-400 text-yellow-200">
                Log in
            </a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}"
               class="px-4 py-2 rounded border border-orange-400 text-orange-400">
                Register
            </a>
            @endif
            <a href="{{ route('profiles.index') }}"
               class="px-4 py-2 rounded border border-orange-400 bg-orange-400 text-yellow-200">
                Profielen
            </a>
            @endauth
        </div>
        @endif
    </div>
</div>
</body>
</html>
