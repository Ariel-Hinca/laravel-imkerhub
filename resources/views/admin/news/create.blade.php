<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white text-2xl">
            Admin - Nieuws toevoegen
        </h2>
    </x-slot>
    <div class="text-white" style="padding-left: 150px;">

        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <p>Titel:<br>
                <input type="text" name="title" value="{{ old('title') }}" class="text-black">
            </p>

            <p>Content:<br>
                <textarea name="content" rows="6" class="text-black">{{ old('content') }}</textarea>
            </p>

            <p>Publicatiedatum:<br>
                <input type="date" name="published_at" value="{{ old('published_at') }}" class="text-black">
            </p>

            <p>Afbeelding:<br>
                <input type="file" name="image">
            </p>
            <br>
            <button type="submit" class="text-green-400 text-xl">Opslaan</button>
        </form>
        <br>
        <p><a href="{{ route('admin.news.index') }}" class="text-blue-400">← Terug</a></p>

    </div>
</x-app-layout>
