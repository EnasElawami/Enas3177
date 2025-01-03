<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;


class ProductController extends Controller
{
    // عرض جميع المنتجات
    public function index()
    {
        $products = Product::all(); // جلب جميع المنتجات
        return view('products.index', compact('products'));
    }

    // عرض نموذج إنشاء منتج جديد
    public function create()
    {
        $categories = Category::all();
        return view('products.create' ,compact('categories'));
    }

    // تخزين المنتج الجديد في قاعدة البيانات
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public'); // حفظ الصورة في storage
        }
    
        Product::create([
            'name' => $request->name,
            'category_id' =>$request->category_id,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imagePath,
        ]);
    
        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    // عرض منتج واحد
    public function show($id)
    {
        $product = Product::findOrFail($id); // جلب المنتج المطلوب
        return view('products.show', compact('product'));
    }

    // عرض نموذج تعديل منتج
    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product', 'categories'));
    }

    // تحديث المنتج في قاعدة البيانات
    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $product = Product::findOrFail($id);

    $imagePath = $product->image;
    if ($request->hasFile('image')) {
        if ($imagePath) {
            Storage::delete('public/' . $imagePath); // حذف الصورة القديمة
        }
        $imagePath = $request->file('image')->store('products', 'public'); // حفظ الصورة الجديدة
    }

    $product->update([
        'name' => $request->name,
        'price' => $request->price,
        'description' => $request->description,
        'image' => $imagePath,
    ]);

    return redirect()->route('products.index')->with('success', 'Product updated successfully!');
}

    // حذف منتج
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}