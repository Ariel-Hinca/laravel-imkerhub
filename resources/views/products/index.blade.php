<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white text-2xl">
            Producten
        </h2>
    </x-slot>
    <div class="text-white" style="padding-left: 150px;">

        @auth
        @if(auth()->user()->role === 'seller' || auth()->user()->role === 'admin')
        <p><a href="{{ route('products.create') }}" class="text-blue-400">+ Nieuw product</a></p>
        @endif
        @endauth
        <br>
        @if($products->count() === 0)
        <p>Geen producten.</p>
        @else
        <ul>
            @foreach($products as $product)
            <li>
                <strong>{{ $product->name }}</strong><br>
                {{ $product->description }}<br>
                Prijs: €{{ $product->price }}<br>
                Verkoper: {{ $product->user->name }}
            </li>
            <br>
            @auth
            @if(auth()->user()->role === 'customer' || auth()->user()->role === 'admin' || auth()->user()->role === 'seller')
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="number" name="quantity" value="1" min="1" max="99" class="text-black">
                <button type="submit" class="text-green-400" style="font-weight: bold;">Bestel</button>
            </form>
            @endif
            @endauth
            <br>
            @endforeach
        </ul>
        @endif
        <br>
        <p><a href="/dashboard" class="text-blue-400">Terug naar dashboard </a></p>
    </div>
</x-app-layout>
