<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegController extends Controller
{
    public function index()
    {
        return view('lr.register', [
            'active' => ' ',
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $validData = $request->validate([
            'name' => 'required|max:100|alpha',
            'username' => 'required|min:3|max:100|unique:users',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:8'
            // 'password' => ['required', Password::min(8)->mixedCase()->letters()->numbers()->symbols()->uncompromised()]
        ]);

        $validData['password'] = Hash::make($validData['password']);

        User::create($validData);

        // $request->session()->flash('200', 'Please Login');
        return redirect('/login')->with('s', 'Please Login!');
    }
}
