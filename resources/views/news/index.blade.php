<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white text-2xl">
            Laatste nieuwtjes
        </h2>
    </x-slot>
    <div class="text-white" style="padding-left: 150px;">

        @if($newsItems->count() === 0)
        <p>Er zijn nog geen nieuwsitems.</p>
        @else
        <ul>
            @foreach($newsItems as $item)
            <li>
                <p style="font-weight: bold;">
                    {{ $item->title }}
                </p>
                ({{ $item->published_at }})
                <n></n>
                <a href="{{ route('news.show', $item->id) }}" class="text-red-400"> Read me!</a>
            </li>
            <br>
            @endforeach
        </ul>
        @endif
        <p><a href="/dashboard" class="text-blue-400 text-xl">Terug naar dashboard</a></p>
    </div>
</x-app-layout>
