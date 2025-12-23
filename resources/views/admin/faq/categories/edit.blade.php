<h1>Categorie bewerken</h1>

<form action="{{ route('admin.faq.categories.update', $category->id) }}" method="POST">
    @csrf
    <p>Naam:<br>
        <input type="text" name="name" value="{{ $category->name }}">
    </p>
    <button type="submit">Opslaan</button>
</form>

<p><a href="{{ route('admin.faq.categories.index') }}">← Terug</a></p>
