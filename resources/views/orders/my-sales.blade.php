<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white text-2xl">
            Mijn verkopen
        </h2>
    </x-slot>
    <div class="text-white" style="padding-left: 150px;">

        @if($items->count() === 0)
        <p>Er zijn nog geen bestellingen op jouw producten.</p>
        @else
        <ul>
            @foreach($items as $item)
            <li>
                <strong>Product: {{ $item->product->name ?? 'Product verwijderd' }} <br></strong>
                Aantal: {{ $item->quantity }} <br>
                Klant: {{ $item->order->user->name ?? 'Onbekend' }} <br>
                Bestelling #{{ $item->order->id }}
            </li>
            <br>
            @endforeach
        </ul>
        @endif
        <br>
        <p><a href="/dashboard" class="text-blue-400">Terug naar dashboard</p>
    </div>
</x-app-layout>
