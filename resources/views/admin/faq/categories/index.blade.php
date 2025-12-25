<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white text-2xl">
            Admin - FAQ categorieën
        </h2>
    </x-slot>
    <div class="text-white" style="padding-left: 150px;">
        <p><a href="{{ route('admin.faq.categories.create') }}" class="text-blue-400">+ Nieuwe categorie</a></p>
        <br>
        @if($categories->count() === 0)
        <p>Geen categorieën.</p>
        @else
        <ul>
            @foreach($categories as $category)
            <li>
                {{ $category->name }}
                - <a href="{{ route('admin.faq.categories.edit', $category->id) }}" class="text-blue-400">Bewerk</a>

                <form action="{{ route('admin.faq.categories.destroy', $category->id) }}" method="POST"
                      style="display:inline;">
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
