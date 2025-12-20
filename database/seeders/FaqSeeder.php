<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FaqCategory;
use App\Models\FaqItem;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $start = FaqCategory::create(['name' => 'Starten met imkeren']);
        FaqItem::create([
            'faq_category_id' => $start->id,
            'question' => 'Heb ik ervaring nodig om te starten met imkeren?',
            'answer' => 'Nee. Je kan starten met begeleiding van een ervaren imker (peter).',
        ]);
        FaqItem::create([
            'faq_category_id' => $start->id,
            'question' => 'Wat heb ik nodig om te beginnen?',
            'answer' => 'Een basispak, handschoenen, een kast en een starterkolonie zijn vaak genoeg om te starten.',
        ]);

        $honey = FaqCategory::create(['name' => 'Honing & producten']);
        FaqItem::create([
            'faq_category_id' => $honey->id,
            'question' => 'Hoe bewaar ik honing het best?',
            'answer' => 'Bewaar honing op kamertemperatuur, droog en uit direct zonlicht.',
        ]);
    }
}
