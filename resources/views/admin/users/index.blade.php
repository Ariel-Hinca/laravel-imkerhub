<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white text-2xl">
            Admin - Gebruikers
        </h2>
    </x-slot>
    <div class="text-white" style="padding-left: 150px;">

        <ul>
            @foreach($users as $user)
            <li>
                {{ $user->name }} ({{ $user->email }}) - role: {{ $user->role }}

                @if($user->email !== 'admin@ehb.be')
                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="text-red-400">Verwijder</button>
                </form>
                @else
                (default admin)
                @endif
            </li>
            <br>
            @endforeach
        </ul>

        <p><a href="/dashboard" class="text-blue-400">Terug naar dashboard</a></p>
    </div>
</x-app-layout>
