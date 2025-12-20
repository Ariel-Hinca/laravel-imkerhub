<h1>{{ $news->title }}</h1>
<p>Publicatiedatum: {{ $news->published_at }}</p>

@if($news->image)
<p>
    <img src="{{ asset('storage/' . $news->image) }}" width="300" alt="Nieuws afbeelding">
</p>
@endif

<p>{{ $news->content }}</p>

<p><a href="{{ route('news.index') }}">← Terug naar alle nieuwtjes</a></p>

