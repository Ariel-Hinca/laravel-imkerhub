<h1>Admin - Bestellingen</h1>

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
@endforeach
@endif

<p><a href="/dashboard">Terug naar admin</a></p>
