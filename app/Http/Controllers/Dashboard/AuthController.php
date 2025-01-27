<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\adminLoginRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('dashboard.auth.login');
    }

    public function postLogin(adminLoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $remember_me = $request->has('remember_me');
        if (Auth::guard('admin')->attempt($credentials, $remember_me)) {
            return redirect()->route('admin.dashboard')->with('success', 'تم تسجيل الدخول بنجاح');
        }

        return redirect()->route('admin.login')->with([
            'error' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة',
        ])->withInput($request->only('email'));
    }

    public function logout(): RedirectResponse
    {
        auth('admin')->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
