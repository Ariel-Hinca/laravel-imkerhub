<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profiel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-yellow-200 text-gray-900">
<div class="min-h-screen flex flex-col items-center justify-center gap-4">

    <h1 class="text-2xl font-bold">
        Profiel van {{ $user->username ?? $user->name }}
    </h1>

    @if($user->avatar)
    <img src="{{ asset('storage/' . $user->avatar) }}" width="120">
    @endif

    <p><strong>Email:</strong> {{ $user->email }}</p>

    @if($user->about)
    <p>{{ $user->about }}</p>
    @endif

    <a href="{{ route('profiles.index') }}" class="px-4 py-2 rounded border border-orange-400 text-orange-400">
        <strong>Terug naar profielen</strong>
    </a>

    <a href="/" class="px-4 py-2 rounded border border-orange-400 bg-orange-400 text-yellow-200">
        <strong>Terug naar home</strong>
    </a>

</div>
</body>
</html>
