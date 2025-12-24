<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class OrderController extends Controller
{
    // 1 bestelling per klik, 1 item
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1|max:99',
        ]);

        $product = Product::findOrFail($data['product_id']);

        // 1) maak order
        $order = Order::create([
            'user_id' => auth()->id(),
        ]);

        // 2) voeg item toe
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => $data['quantity'],
        ]);

        return redirect()->route('orders.my')->with('success', 'Bestelling geplaatst!');
    }

    public function myOrders()
    {
        $orders = Order::where('user_id', auth()->id())
            ->with('items.product')
            ->orderBy('id', 'desc')
            ->get();

        return view('orders.my', compact('orders'));
    }
}
