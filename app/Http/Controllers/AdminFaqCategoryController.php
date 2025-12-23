<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqCategory;

class AdminFaqCategoryController extends Controller
{
    public function index()
    {
        $categories = FaqCategory::orderBy('name')->get();
        return view('admin.faq.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.faq.categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        FaqCategory::create($data);

        return redirect()->route('admin.faq.categories.index');
    }

    public function edit(FaqCategory $category)
    {
        return view('admin.faq.categories.edit', compact('category'));
    }

    public function update(Request $request, FaqCategory $category)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($data);

        return redirect()->route('admin.faq.categories.index');
    }

    public function destroy(FaqCategory $category)
    {
        $category->delete();
        return redirect()->route('admin.faq.categories.index');
    }
}
