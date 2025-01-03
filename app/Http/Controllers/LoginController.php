<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // إعادة توجيه المستخدم بعد تسجيل الدخول
    protected function authenticated(Request $request, $user)
    {
        return redirect()->route('main'); // إعادة توجيه المستخدم إلى صفحة Main Page
    }
}