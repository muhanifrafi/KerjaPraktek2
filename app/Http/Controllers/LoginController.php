<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TmUserCustomer;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'n_user' => ['required', 'string'],
            'n_password' => ['required', 'string'],
        ]);

        $pass = md5($credentials['n_password']);
        $cpassword = sha1($pass);
        $layer = encryptpass($credentials['n_user']);
        $cpassword = $cpassword.$layer;

        $user = TmUserCustomer::where('n_user', $credentials['n_user'])->first();

        if (!$user || $user->n_password !== $cpassword) {
            return back()->withInput($request->only('n_user'))->withErrors([
                'n_user' => 'User ID or Password is incorrect.',
            ]);
        }

        Auth::login($user);
        $request->session()->put('session_timeout', time() + 120);
        return redirect()->intended('/');
    }

    public function logout(Request $request)
    {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
    }
}