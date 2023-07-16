<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('lr.login', [
            'title' => 'Login'
        ]);
    }


    public function auth(Request $request)
    {
        $confirm = $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($confirm)) {
            $request->session()->regenerateToken();

            return redirect()->intended('/');
        }

        return back()->with('err', 'Login Failed!');
    }


    public function exit(Request $req)
    {
        Auth::logout();

        $req->session()->invalidate();

        $req->session()->regenerateToken();

        return redirect('/login');
    }
}
