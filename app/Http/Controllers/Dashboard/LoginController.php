<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\adminLoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
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
}
