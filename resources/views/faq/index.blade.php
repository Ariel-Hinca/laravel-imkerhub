<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white text-2xl">
            FAQ's
        </h2>
    </x-slot>
    <div class="text-white" style="padding-left: 150px;">

        @if($categories->count() === 0)
        <p>Er zijn nog geen FAQ items.</p>
        @else
        @foreach($categories as $category)
        <h2 class="text-green-400 text-xl">{{ $category->name }}</h2>

        @if($category->items->count() === 0)
        <p>Geen vragen in deze categorie.</p>
        <br>
        @else
        <ul>
            @foreach($category->items as $item)
            <li>
                <strong>{{ $item->question }}</strong><br>
                {{ $item->answer }}
            </li>
            <br>
            @endforeach
        </ul>
        @endif
        @endforeach
        @endif

        <p><a href="/dashboard" class="text-blue-400 text-xl">Terug naar dashboard</a></p>
    </div>
</x-app-layout>
