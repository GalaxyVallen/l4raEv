<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CatergoryController extends Controller
{
    public function index()
    {
        return view('categories', [
            'active' => 'c',
            'title' => 'All Category',
            'categories' => Category::all()
        ]);
    }
}
