<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white text-2xl">
            Admin - Bestellingen
        </h2>
    </x-slot>
    <div class="text-white" style="padding-left: 150px;">

        @if($orders->count() === 0)
        <p>Geen bestellingen.</p>
        @else
        @foreach($orders as $order)
        <h3>Bestelling #{{ $order->id }} - {{ $order->user->name ?? 'Onbekend' }}</h3>
        <ul>
            @foreach($order->items as $item)
            <li>
                {{ $item->product->name ?? 'Product verwijderd' }}
                - aantal: {{ $item->quantity }}
            </li>
            @endforeach
        </ul>
        <br>
        @endforeach
        @endif

        <p><a href="/dashboard" class="text-blue-400">Terug naar dashboard</a></p>
    </div>
</x-app-layout>
