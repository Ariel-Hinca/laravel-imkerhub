<?php

namespace Database\Seeders;

use App\Models\News;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        News::create([
            'title' => 'Welkom op ImkerHub',
            'content' => 'ImkerHub is een platform voor imkers en klanten. Binnenkort kan je hier nieuws, producten en begeleiding vinden.',
            'image' => null,
            'published_at' => now()->toDateString(),
        ]);

        News::create([
            'title' => 'Eerste imkerprofielen staan online',
            'content' => 'Gebruikers kunnen nu hun profiel aanvullen met username, verjaardag, over mij en een profielfoto.',
            'image' => null,
            'published_at' => now()->toDateString(),
        ]);
    }
}
