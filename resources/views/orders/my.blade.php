<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white text-2xl">
            Mijn bestellingen
        </h2>
    </x-slot>
    <div class="text-white" style="padding-left: 150px;">

        @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
        @endif

        @if($orders->count() === 0)
        <p>Je hebt nog geen bestellingen.</p>
        @else
        @foreach($orders as $order)
        <h3><strong>Bestelling #{{ $order->id }} ({{ $order->created_at }})</strong></strong></h3>

        <ul>
            @foreach($order->items as $item)
            <li>
                {{ $item->product->name ?? 'Product verwijderd' }}
                - Aantal: {{ $item->quantity }}
            </li>
            @endforeach
        </ul>
        <br>
        @endforeach
        @endif
        <p><a href="/dashboard" class="text-blue-400">Terug naar dashboard </a></p>
    </div>
</x-app-layout>
