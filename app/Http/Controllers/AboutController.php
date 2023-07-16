<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('abt', [
            'title' => 'About',
            'avatar' => 'pp4.jpg'
        ]);
    }
}
