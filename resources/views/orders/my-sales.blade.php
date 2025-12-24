<h1>Mijn verkopen</h1>

@if($items->count() === 0)
<p>Er zijn nog geen bestellingen op jouw producten.</p>
@else
<ul>
    @foreach($items as $item)
    <li>
        Product: {{ $item->product->name ?? 'Product verwijderd' }} <br>
        Aantal: {{ $item->quantity }} <br>
        Klant: {{ $item->order->user->name ?? 'Onbekend' }} <br>
        Bestelling #{{ $item->order->id }}
    </li>
    <hr>
    @endforeach
</ul>
@endif

<p><a href="/products">← Terug naar producten</a></p>

