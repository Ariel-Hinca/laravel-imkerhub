<h1>Nieuwsitem toevoegen</h1>

<form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <p>Titel:<br>
        <input type="text" name="title" value="{{ old('title') }}">
    </p>

    <p>Content:<br>
        <textarea name="content" rows="6">{{ old('content') }}</textarea>
    </p>

    <p>Publicatiedatum:<br>
        <input type="date" name="published_at" value="{{ old('published_at') }}">
    </p>

    <p>Afbeelding:<br>
        <input type="file" name="image">
    </p>

    <button type="submit">Opslaan</button>
</form>

<p><a href="{{ route('admin.news.index') }}">← Terug</a></p>
