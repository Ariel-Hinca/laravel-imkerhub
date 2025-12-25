<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white text-2xl">
            Admin - Categorie bewerken
        </h2>
    </x-slot>
    <div class="text-white" style="padding-left: 150px;">

<form action="{{ route('admin.faq.categories.update', $category->id) }}" method="POST">
    @csrf
    <p>Naam:<br>
        <input type="text" name="name" value="{{ $category->name }}" class="text-black">
    </p>
    <button type="submit" class="text-green-400 text-xl">Opslaan</button>
</form>

<p><a href="{{ route('admin.faq.categories.index') }}" class="text-blue-400">Terug naar categorieën</a></p>
    </div>
</x-app-layout>
