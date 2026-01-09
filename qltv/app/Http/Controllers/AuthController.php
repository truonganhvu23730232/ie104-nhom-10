<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // qltv
    public function validateAdminSignin()
    {
        if (Auth::check()) {
            return redirect()->route('qltv.main');
        }

        return view('qltv.auth.signin');
    }

    public function adminSignin(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên đăng nhập',
            'password.required' => 'Vui lòng nhập mật khẩu',
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            return redirect()->intended(route('qltv.main'));
        }

        return back()->withErrors([
            'name' => 'Tên đăng nhập hoặc mật khẩu không chính xác.',
        ])->onlyInput('name');
    }

    public function adminSignout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('qltv.auth.signin');
    }

    // tvcc
}
