<h1>Producten</h1>

@auth
@if(auth()->user()->role === 'seller' || auth()->user()->role === 'admin')
<p><a href="{{ route('products.create') }}">+ Nieuw product</a></p>
@endif
@endauth

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
    @endforeach
</ul>
@endif

@auth
@if(auth()->user()->role === 'customer' || auth()->user()->role === 'admin')
<form action="{{ route('orders.store') }}" method="POST">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <input type="number" name="quantity" value="1" min="1" max="99">
    <button type="submit">Bestel</button>
</form>
@endif
@endauth


<p><a href="/dashboard">Terug naar dashboard </a></p>
