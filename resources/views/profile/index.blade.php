<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alle Profielen</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-yellow-200 text-gray-900">
<div class="min-h-screen flex flex-col items-center justify-center gap-4">

    <h1 class="text-2xl font-bold">Alle Profielen</h1>

    <ul class="text-center bg-amber-50 rounded border px-4 py-2">
        @foreach($users as $user)
        <li class="mb-2">
            <a href="{{ route('profile.show', $user->id) }}"
               class="text-orange-600">
                {{ $user->username ?? $user->name }}
            </a>
        </li>
        @endforeach
    </ul>

    <a href="/" class="px-4 py-2 rounded border border-orange-400 bg-orange-400 text-yellow-200"><strong>Terug naar home</strong></a>

</div>
</body>
</html>
