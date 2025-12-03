<h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Extra profielinformatie</h2>

<form action="{{ route('profile.update.extra') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
        <label>Username:</label><br>
        <input type="text" name="username" value="{{ $user->username }}">
    </p>

    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
        <label>Verjaardag:</label><br>
        <input type="date" name="birthday" value="{{ $user->birthday }}">
    </p>

    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
        <label>Over mij:</label><br>
        <textarea name="about" rows="4">{{ $user->about }}</textarea>
    </p>

    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
        <label>Profielfoto:</label><br>
        <input type="file" name="avatar">
    </p>

    @if($user->avatar)
    <p>Huidige foto:</p>
    <img src="{{ asset('storage/' . $user->avatar) }}" width="2000">
    @endif

    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
        <button type="submit">Opslaan</button>
    </p>
</form>
