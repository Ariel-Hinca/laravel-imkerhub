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
                {{ $user->name }} ({{ $user->email }}) - role:

                {{-- Rol wijzigen (behalve default admin) --}}
                @if($user->email !== 'admin@ehb.be')
                <form action="{{ route('admin.users.updateRole', $user->id) }}" method="POST" style="display:inline;">
                    @csrf

                    <select name="role" class="text-black">
                        <option value="user" @if($user->role === 'user') selected @endif>Customer</option>
                        <option value="seller" @if($user->role === 'seller') selected @endif>Seller</option>
                        <option value="admin" @if($user->role === 'admin') selected @endif>Admin</option>
                    </select>

                    <button type="submit" class="text-blue-400 ml-2">Wijzig</button>
                </form>

                {{-- Verwijderen --}}
                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="text-red-400 ml-2">Verwijder</button>
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
