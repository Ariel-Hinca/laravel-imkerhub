<h1>Product toevoegen</h1>

<form method="POST" action="{{ route('products.store') }}">
    @csrf

    <p>
        Naam:<br>
        <input type="text" name="name" required>
    </p>

    <p>
        Beschrijving:<br>
        <textarea name="description"></textarea>
    </p>

    <p>
        Prijs (€):<br>
        <input type="number" step="0.01" name="price" required>
    </p>

    <button type="submit">Opslaan</button>
</form>

<p><a href="{{ route('products.index') }}">← Terug</a></p>

