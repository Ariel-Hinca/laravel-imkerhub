<h1>FAQ item toevoegen</h1>

<form action="{{ route('admin.faq.items.store') }}" method="POST">
    @csrf

    <p>Categorie:<br>
        <select name="faq_category_id">
            @foreach($categories as $cat)
            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>
    </p>

    <p>Vraag:<br>
        <input type="text" name="question">
    </p>

    <p>Antwoord:<br>
        <textarea name="answer" rows="5"></textarea>
    </p>

    <button type="submit">Opslaan</button>
</form>

<p><a href="{{ route('admin.faq.items.index') }}">← Terug</a></p>
