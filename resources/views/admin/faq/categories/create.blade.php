<h1>Admin - FAQ categorieën</h1>

<p><a href="{{ route('admin.faq.categories.create') }}">+ Nieuwe categorie</a></p>
<p><a href="{{ route('admin.faq.items.index') }}">FAQ items beheren</a></p>

@if($categories->count() === 0)
<p>Geen categorieën.</p>
@else
<ul>
    @foreach($categories as $category)
    <li>
        {{ $category->name }}
        - <a href="{{ route('admin.faq.categories.edit', $category->id) }}">Bewerk</a>

        <form action="{{ route('admin.faq.categories.destroy', $category->id) }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit">Verwijder</button>
        </form>
    </li>
    @endforeach
</ul>
@endif

<p><a href="/admin">Terug naar admin</a></p>
