<x-app-layout>
    <x-slot name="header">
        <h2 class="text-white text-2xl">
            Admin – Contactberichten
        </h2>
    </x-slot>

    <div class="text-white" style="padding-left: 150px;">

        @foreach($lines as $line)

        @if(str_starts_with($line, 'Naam:'))
        <br>
        @endif

        <p>{{ $line }}</p>

        @endforeach

        @if(empty($lines))
        <p>Geen berichten gevonden.</p>
        @endif

    </div>
</x-app-layout>
