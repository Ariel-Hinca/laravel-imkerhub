<h1>Laatste nieuwtjes</h1>

@if($newsItems->count() === 0)
<p>Er zijn nog geen nieuwsitems.</p>
@else
<ul>
    @foreach($newsItems as $item)
    <li>
        <a href="{{ route('news.show', $item->id) }}">
            {{ $item->title }}
        </a>
        ({{ $item->published_at }})
    </li>
    @endforeach
</ul>
@endif

<p><a href="/">Terug naar home</a></p>
