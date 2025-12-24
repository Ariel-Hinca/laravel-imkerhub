<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // lijst van producten (publiek)
    public function index()
    {
        $products = Product::with('user')->get();
        return view('products.index', compact('products'));
    }

    // formulier tonen (alleen seller/admin)
    public function create()
    {
        return view('products.create');
    }

    // product opslaan
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        $data['user_id'] = auth()->id();

        Product::create($data);

        return redirect()->route('products.index');
    }
}
