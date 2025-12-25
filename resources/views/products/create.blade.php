<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white text-2xl">
            Product toevoegen
        </h2>
    </x-slot>
    <div class="text-white" style="padding-left: 150px;">

        <form method="POST" action="{{ route('products.store') }}">
            @csrf

            <p>
                Naam:<br>
                <input type="text" name="name" required class="text-black">
            </p>

            <p>
                Beschrijving:<br>
                <textarea name="description" class="text-black"></textarea>
            </p>

            <p>
                Prijs (€):<br>
                <input type="number" step="0.01" name="price" required class="text-black">
            </p>
<br>
            <button type="submit" class="text-green-400 text-xl"><strong>Opslaan</strong></button>
        </form>
        <br>
        <p><a href="{{ route('products.index') }}" class="text-blue-400">Terug naar producten</a></p>
    </div>
</x-app-layout>
