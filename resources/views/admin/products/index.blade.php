<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white text-2xl">
            Admin - Producten
        </h2>
    </x-slot>
    <div class="text-white" style="padding-left: 150px;">

        @if($products->count() === 0)
        <p>Geen producten.</p>
        @else
        <ul>
            @foreach($products as $product)
            <li>
                <strong>{{ $product->name }}</strong>
                (€{{ $product->price }}) -
                Verkoper: {{ $product->user->name ?? 'Onbekend' }}

                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                      style="display:inline;">
                    @csrf
                    <button type="submit" class="text-red-400">Verwijder </button>
                </form>
            </li>
            <br>
            @endforeach
        </ul>
        <br>
        @endif

        <p><a href="/dashboard" class="text-blue-400">Terug naar admin</a></p>
    </div>
</x-app-layout>
