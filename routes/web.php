<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\EngineerController;
use Illuminate\Support\Facades\Auth;

Route::get('/admin/dashboard', function () {
    $notifications = Auth::user()->unreadNotifications; // جلب التنبيهات غير المقروءة
    return view('layouts.admin', compact('notifications'));
})->name('admin.dashboard');

Route::get('', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/about', [HomeController::class, 'about'])->name('home.about');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');
Route::get('/engineers', [HomeController::class, 'engineers'])->name('home.engineers');
Route::get('/store', [HomeController::class, 'store'])->name('home.store');
Route::post('/engineers', [EngineerController::class, 'store'])->name('engineers.store');
Route::put('/engineers/{engineer}', [EngineerController::class, 'update'])->name('engineers.update');
Route::get('/engineers', [EngineerController::class, 'index'])->name('engineers.index');
Route::get('/engineers/{id}', [EngineerController::class, 'show'])->name('engineers.show');

Route::resource('cart', CartController::class);
Route::resource('users', UserController::class);
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);

Route::get('/register', [EngineerController::class, 'create'])->name('engineer.register');
Route::post('/register', [EngineerController::class, 'store'])->name('engineer.store');
// Home Page
Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

// Engineers Page
Route::get('/engineers', function () {return view('home.engineers');})->name('home.engineers');

// Store Page
Route::get('/store', function () {return view('pages.store');})->name('home.store');

// About Page
Route::get('/about', function () {return view('pages.about');})->name('home.about');

// Route::get('/main', [MainPageController::class, 'index'])->name('main')->middleware('auth');

Route::post('/engineers/store', [EngineerController::class, 'store'])->name('engineers.store');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
require __DIR__.'/auth.php';
