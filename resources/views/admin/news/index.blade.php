<h1>Admin - Nieuws</h1>

<p><a href="{{ route('admin.news.create') }}">+ Nieuw nieuwsitem</a></p>

@if($newsItems->count() === 0)
<p>Geen nieuwsitems.</p>
@else
<ul>
    @foreach($newsItems as $item)
    <li>
        {{ $item->title }} ({{ $item->published_at }})
        - <a href="{{ route('admin.news.edit', $item->id) }}">Bewerk</a>

        <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit">Verwijder</button>
        </form>
    </li>
    @endforeach
</ul>
@endif

<p><a href="/">Terug naar home</a></p>
