<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqCategory;
use App\Models\FaqItem;

class AdminFaqItemController extends Controller
{
    public function index()
    {
        $items = FaqItem::with('category')->orderBy('id', 'desc')->get();
        return view('admin.faq.items.index', compact('items'));
    }

    public function create()
    {
        $categories = FaqCategory::orderBy('name')->get();
        return view('admin.faq.items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        FaqItem::create($data);

        return redirect()->route('admin.faq.items.index');
    }

    public function edit(FaqItem $item)
    {
        $categories = FaqCategory::orderBy('name')->get();
        return view('admin.faq.items.edit', compact('item', 'categories'));
    }

    public function update(Request $request, FaqItem $item)
    {
        $data = $request->validate([
            'faq_category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $item->update($data);

        return redirect()->route('admin.faq.items.index');
    }

    public function destroy(FaqItem $item)
    {
        $item->delete();
        return redirect()->route('admin.faq.items.index');
    }
}
