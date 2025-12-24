<h1>Admin - Producten</h1>

@if($products->count() === 0)
<p>Geen producten.</p>
@else
<ul>
    @foreach($products as $product)
    <li>
        <strong>{{ $product->name }}</strong>
        (€{{ $product->price }}) -
        Verkoper: {{ $product->user->name ?? 'Onbekend' }}

        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit">Verwijder</button>
        </form>
    </li>
    @endforeach
</ul>
@endif

<p><a href="/dashboard">Terug naar admin</a></p>
