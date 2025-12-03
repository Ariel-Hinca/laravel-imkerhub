<h1>Profiel van {{ $user->username ?? $user->name }}</h1>

@if($user->avatar)
<img src="{{ asset('storage/' . $user->avatar) }}" width="150">
@endif

<p>Email: {{ $user->email }}</p>

@if($user->birthday)
<p>Verjaardag: {{ $user->birthday }}</p>
@endif

@if($user->about)
<p>Over mij: {{ $user->about }}</p>
@endif

<a href="/">Terug naar home</a>
