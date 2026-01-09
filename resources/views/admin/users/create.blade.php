<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white text-2xl">
            Admin - User toevoegen
        </h2>
    </x-slot>

    <div class="text-white" style="padding-left: 150px;">

        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            <p>Naam:<br>
                <input type="text" name="name" value="{{ old('name') }}" class="text-black">
            </p>

            <p>Email:<br>
                <input type="email" name="email" value="{{ old('email') }}" class="text-black">
            </p>

            <p>Wachtwoord:<br>
                <input type="password" name="password" class="text-black">
            </p>

            <p>Rol:<br>
                <select name="role" class="text-black">
                    <option value="user">Customer</option>
                    <option value="seller">Seller</option>
                    <option value="admin">Admin</option>
                </select>
            </p>

            <br>
            <button type="submit" class="text-green-400 text-xl">Opslaan</button>
        </form>

        <br>
        <p><a href="{{ route('admin.users.index') }}" class="text-blue-400">← Terug</a></p>

    </div>
</x-app-layout>
