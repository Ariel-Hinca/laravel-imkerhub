<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white text-2xl">
            {{ $news->title }}
        </h2>
    </x-slot>
    <div class="text-white" style="padding-left: 150px;">

        <p>Publicatiedatum: {{ $news->published_at }}</p>
        <br>
        @if($news->image)
        <p>
            <img src="{{ asset('storage/' . $news->image) }}" width="300" alt="Nieuws afbeelding">
        </p>
        @endif

        <p>{{ $news->content }}</p>
        <br>
        <p><a href="{{ route('news.index') }}" class="text-blue-400">Terug naar alle nieuwtjes</a></p>
    </div>
</x-app-layout>
