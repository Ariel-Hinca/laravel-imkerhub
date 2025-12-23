<h1>Admin - FAQ items</h1>

<p><a href="{{ route('admin.faq.items.create') }}">+ Nieuw FAQ item</a></p>
<p><a href="{{ route('admin.faq.categories.index') }}">Categorieën beheren</a></p>

@if($items->count() === 0)
<p>Geen items.</p>
@else
<ul>
    @foreach($items as $item)
    <li>
        <strong>{{ $item->question }}</strong>
        ({{ $item->category->name ?? 'Geen categorie' }})
        - <a href="{{ route('admin.faq.items.edit', $item->id) }}">Bewerk</a>

        <form action="{{ route('admin.faq.items.destroy', $item->id) }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit">Verwijder</button>
        </form>
    </li>
    @endforeach
</ul>
@endif

<p><a href="/dashboard">Terug naar dashboard admin</a></p>
