<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white text-2xl">
            Admin - Nieuws
        </h2>
    </x-slot>
    <div class="text-white">
        <p><a href="{{ route('admin.news.create') }}" class="text-blue-400">+ Nieuw nieuwsitem</a></p>
        <br>
        @if($newsItems->count() === 0)
        <p>Geen nieuwsitems.</p>
        @else
        <ul>
            @foreach($newsItems as $item)
            <li>
                {{ $item->title }} ({{ $item->published_at }})
                - <a href="{{ route('admin.news.edit', $item->id) }}" class="text-blue-400">Bewerk</a>

                <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="text-red-400">Verwijder</button>
                </form>
            </li>
            <br>
            @endforeach
        </ul>
        @endif

        <p><a href="/dashboard" class="text-blue-400">Terug naar dashboard admin</p>
    </div>
</x-app-layout>
