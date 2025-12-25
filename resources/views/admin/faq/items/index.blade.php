<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white text-2xl">
            Admin - FAQ items
        </h2>
    </x-slot>
    <div class="text-white" style="padding-left: 150px;">

        <p><a href="{{ route('admin.faq.items.create') }}" class="text-blue-400">+ Nieuw FAQ item</a></p>
        <br>

        @if($items->count() === 0)
        <p>Geen items.</p>
        @else
        <ul>
            @foreach($items as $item)
            <li>
                <strong>{{ $item->question }}</strong>
                ({{ $item->category->name ?? 'Geen categorie' }})
                - <a href="{{ route('admin.faq.items.edit', $item->id) }}" class="text-blue-400">Bewerk</a>

                <form action="{{ route('admin.faq.items.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="text-red-400">Verwijder</button>
                </form>
            </li>
            <br>
            @endforeach
        </ul>

        @endif

        <p><a href="/dashboard" class="text-blue-400">Terug naar dashboard admin</a></p>
    </div>
</x-app-layout>
