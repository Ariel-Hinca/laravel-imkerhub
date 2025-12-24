<h1>Mijn bestellingen</h1>

@if(session('success'))
<p style="color:green;">{{ session('success') }}</p>
@endif

@if($orders->count() === 0)
<p>Je hebt nog geen bestellingen.</p>
@else
@foreach($orders as $order)
<h3>Bestelling #{{ $order->id }} ({{ $order->created_at }})</h3>

<ul>
    @foreach($order->items as $item)
    <li>
        {{ $item->product->name ?? 'Product verwijderd' }}
        - Aantal: {{ $item->quantity }}
    </li>
    @endforeach
</ul>
@endforeach
@endif

<p><a href="{{ route('products.index') }}">← Terug naar producten</a></p>
