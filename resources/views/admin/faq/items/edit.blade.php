<h1>FAQ item bewerken</h1>

<form action="{{ route('admin.faq.items.update', $item->id) }}" method="POST">
    @csrf

    <p>Categorie:<br>
        <select name="faq_category_id">
            @foreach($categories as $cat)
            <option value="{{ $cat->id }}" @if($item->faq_category_id == $cat->id) selected @endif>
                {{ $cat->name }}
            </option>
            @endforeach
        </select>
    </p>

    <p>Vraag:<br>
        <input type="text" name="question" value="{{ $item->question }}">
    </p>

    <p>Antwoord:<br>
        <textarea name="answer" rows="5">{{ $item->answer }}</textarea>
    </p>

    <button type="submit">Opslaan</button>
</form>

<p><a href="{{ route('admin.faq.items.index') }}">← Terug</a></p>
