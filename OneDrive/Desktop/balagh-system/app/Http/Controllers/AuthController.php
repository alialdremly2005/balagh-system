<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // صفحة تسجيل الدخول
    public function showLogin()
    {
        return view('login');
    }

    // تسجيل الدخول
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()
                ->withErrors([
                    'email' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة.',
                ])
                ->withInput();
        }

        $request->session()->regenerate();

        $request->session()->put('user_id', $user->id);
        $request->session()->put('user_name', $user->name);
        $request->session()->put('user_role', $user->role);

        if ($user->role === 'admin') {
            return redirect('/admin');
        }

        return redirect('/dashboard');
    }

    // صفحة إنشاء حساب
    public function showRegister()
    {
        return view('register');
    }

    // إنشاء حساب جديد
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        $request->session()->regenerate();

        $request->session()->put('user_id', $user->id);
        $request->session()->put('user_name', $user->name);
        $request->session()->put('user_role', $user->role);

        return redirect('/dashboard')->with(
            'success',
            'تم إنشاء الحساب بنجاح ✅'
        );
    }

    // تسجيل الخروج
    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with(
            'success',
            'تم تسجيل الخروج بنجاح ✅'
        );
    }
}