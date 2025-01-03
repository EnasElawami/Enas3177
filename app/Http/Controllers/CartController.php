<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // إضافة Middleware للمصادقة
    public function __construct()
    {
        $this->middleware('auth'); // هذا السطر يضيف المصادقة على جميع الدوال
    }

    // عرض السلة
    public function index()
    {
        $cartItems = Cart::with('product')
            ->where('user_id', auth()->id())
            ->get();

        return view('cart.index', compact('cartItems'));
    }

    // إضافة منتج إلى السلة
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        Cart::create([
            'user_id' => auth()->id(),
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('cart.index')->with('success', 'Product added to cart.');
    }
}