<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

class AdminLogMailController extends Controller
{
    public function index()
    {
        $logPath = storage_path('logs/laravel.log');

        if (!File::exists($logPath)) {
            $lines = [];
        } else {
            $content = File::get($logPath);
            $allLines = explode("\n", $content);

            $lines = [];
            $showNext = false;

            foreach ($allLines as $line) {
                $trim = trim($line);

                // Toon Naam, Email, Bericht:
                if (
                    str_starts_with($trim, 'Naam:') ||
                    str_starts_with($trim, 'Email:') ||
                    str_starts_with($trim, 'Bericht:')
                ) {
                    $lines[] = $trim;

                    // Als dit "Bericht:" is → volgende regel ook tonen
                    if (str_starts_with($trim, 'Bericht:')) {
                        $showNext = true;
                    }

                    continue;
                }

                // Toon de regel NA "Bericht:"
                if ($showNext) {
                    if ($trim !== '') {
                        $lines[] = $trim;
                    }
                    $showNext = false;
                }
            }
        }

        return view('admin.log-mails.index', compact('lines'));
    }
}
