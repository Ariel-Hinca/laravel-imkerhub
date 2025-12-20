<h1>Nieuwsitem bewerken</h1>

<form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

    <p>Titel:<br>
        <input type="text" name="title" value="{{ old('title', $news->title) }}">
    </p>

    <p>Content:<br>
        <textarea name="content" rows="6">{{ old('content', $news->content) }}</textarea>
    </p>

    <p>Publicatiedatum:<br>
        <input type="date" name="published_at" value="{{ old('published_at', $news->published_at) }}">
    </p>

    <p>Nieuwe afbeelding (optioneel):<br>
        <input type="file" name="image">
    </p>

    @if($news->image)
    <p>Huidige afbeelding:</p>
    <img src="{{ asset('storage/' . $news->image) }}" width="250">
    @endif

    <button type="submit">Opslaan</button>
</form>

<p><a href="{{ route('admin.news.index') }}">← Terug</a></p>

