<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white text-2xl">
            Admin - FAQ item bewerken
        </h2>
    </x-slot>
    <div class="text-white" style="padding-left: 150px;">

<form action="{{ route('admin.faq.items.update', $item->id) }}" method="POST">
    @csrf

    <p>Categorie:<br>
        <select name="faq_category_id" class="text-black">
            @foreach($categories as $cat)
            <option value="{{ $cat->id }}" @if($item->faq_category_id == $cat->id) selected @endif>
                {{ $cat->name }}
            </option>
            @endforeach
        </select>
    </p>

    <p>Vraag:<br>
        <input type="text" name="question" value="{{ $item->question }}" class="text-black">
    </p>

    <p>Antwoord:<br>
        <textarea name="answer" rows="5" class="text-black">{{ $item->answer }}</textarea>
    </p>

    <button type="submit" class="text-green-400 text-xl">Opslaan</button>
</form>

<p><a href="{{ route('admin.faq.items.index') }}" class="text-blue-400">← Terug</a></p>
</div>
</x-app-layout>
