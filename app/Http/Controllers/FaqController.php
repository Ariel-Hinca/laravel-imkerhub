<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqCategory;

class FaqController extends Controller
{
    public function index()
    {
        $categories = FaqCategory::with('items')->orderBy('name')->get();
        return view('faq.index', compact('categories'));
    }
}
