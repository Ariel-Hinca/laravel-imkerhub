<h1>Contact</h1>

@if(session('success'))
<p style="color: green;">
    {{ session('success') }}
</p>
@endif

<form action="{{ route('contact.send') }}" method="POST">
    @csrf

    <p>
        Naam:<br>
        <input type="text" name="name" required>
    </p>

    <p>
        Email:<br>
        <input type="email" name="email" required>
    </p>

    <p>
        Bericht:<br>
        <textarea name="message" rows="5" required></textarea>
    </p>

    <button type="submit">Versturen</button>
</form>

