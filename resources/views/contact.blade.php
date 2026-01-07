<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white text-2xl">
            Contact Admin
        </h2>
    </x-slot>
    <div class="text-white" style="padding-left: 150px;">


        @if(session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
        @endif

        <form action="{{ route('contact.send') }}" method="POST">
            @csrf

            <p>
                Naam:<br>
                <input type="text" name="name" required class="text-black"
            </p>

            <p>
                Email:<br>
                <input type="email" name="email" required class="text-black">
            </p>

            <p>
                Bericht:<br>
                <textarea name="message" rows="5" required class="text-black"></textarea>
            </p>

            <button type="submit" class="text-blue-400"><strong>Versturen</strong></button>
        </form>
    </div>
</x-app-layout>
