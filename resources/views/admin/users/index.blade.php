<h1>Admin - Gebruikers</h1>

<ul>
    @foreach($users as $user)
    <li>
        {{ $user->name }} ({{ $user->email }}) - role: {{ $user->role }}

        @if($user->email !== 'admin@ehb.be')
        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit">Verwijder</button>
        </form>
        @else
        (default admin)
        @endif
    </li>
    @endforeach
</ul>

<p><a href="/dashboard">Terug naar dashboard</a></p>
