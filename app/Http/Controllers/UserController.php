<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // عرض جميع المستخدمين
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // عرض نموذج إنشاء مستخدم جديد
    public function create()
    {
        return view('users.create');
    }

    // تخزين مستخدم جديد في قاعدة البيانات
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'phone'=> 'required',
            'role'=>'required|in:client,engineer',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'phone' => $validated['phone'],
            'role'=>$validated['role'],
        ]);

        return redirect()->route('users.index');
    }

    // عرض مستخدم معين
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // عرض نموذج تعديل بيانات مستخدم
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // تحديث بيانات مستخدم
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update($validated);

        return redirect()->route('users.index');
    }

    // حذف مستخدم
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }
}