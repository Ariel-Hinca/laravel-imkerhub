<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white text-2xl">
            Admin - Nieuwsitem bewerken
        </h2>
    </x-slot>
    <div class="text-white" style="padding-left: 150px;">

        <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <p>Titel:<br>
                <input type="text" name="title" value="{{ old('title', $news->title) }}" class="text-black">
            </p>

            <p>Content:<br>
                <textarea name="content" rows="6" class="text-black">{{ old('content', $news->content) }}</textarea>
            </p>

            <p>Publicatiedatum:<br>
                <input type="date" name="published_at" value="{{ old('published_at', $news->published_at) }}"
                       class="text-black">
            </p>

            <p>Nieuwe afbeelding (optioneel):<br>
                <input type="file" name="image">
            </p>

            @if($news->image)
            <p>Huidige afbeelding:</p>
            <img src="{{ asset('storage/' . $news->image) }}" width="250">
            @endif
            <br>
            <button type="submit" class="text-green-400 text-xl">Opslaan</button>
        </form>
        <br>
        <p><a href="{{ route('admin.news.index') }}" class="text-blue-400">← Terug</a></p>
    </div>
</x-app-layout>
