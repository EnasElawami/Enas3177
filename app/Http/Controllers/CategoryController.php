<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // عرض جميع الفئات
    public function index()
    {
        $categories = Category::all(); // جلب جميع الفئات من قاعدة البيانات
        return view('categories.index', compact('categories'));
    }

    // عرض نموذج إنشاء فئة جديدة
    public function create()
    {
        return view('categories.create');
    }

    // تخزين الفئة الجديدة في قاعدة البيانات
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }

    // عرض فئة واحدة
    public function show($id)
    {
        $category = Category::findOrFail($id); // جلب الفئة المطلوبة
        return view('categories.show', compact('category'));
    }

    // عرض نموذج تعديل فئة
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    // تحديث الفئة في قاعدة البيانات
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    // حذف فئة
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }
}