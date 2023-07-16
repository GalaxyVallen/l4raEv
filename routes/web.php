<?php

// use App\Models\Post;
// use App\Models\User;

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\CatergoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegController;
use App\Http\Controllers\DashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', [
        'active' => 'h',
        'title' => 'Home',
        'name' => 'Rei'
    ]);
});

Route::get('/about', [AboutController::class, 'index']);
Route::get('/blog', [PostController::class, 'index']);
Route::get('/posts', [PostController::class, 'index']);

//ambil apappun didalam /
Route::get('posts/{post:slug}', [PostController::class, 'detail']);
Route::get('/category', [CatergoryController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'auth']);
Route::post('/logout', [LoginController::class, 'exit']);
Route::get('/register', [RegController::class, 'index'])->middleware('guest');
Route::post('/register', [RegController::class, 'store']);

Route::get(
    '/dashboard',
    function () {
        return view('d.dashboard', [
            'active' => ' ',
            'title' => 'Dashboard'
        ]);
    }
)->middleware('auth');

Route::get('/dashboard/posts/new', [DashboardController::class, 'create'])->name('new');
Route::resource('/dashboard/posts', DashboardController::class)->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoryController::class);
// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('posts', [
//         'active' => 'c',
//         'title' => $category->name,
//         'posts' => $category->posts->load('category', 'author'),
//         'category' => $category->name
//     ]);
// });

// Route::get('/author/{author:username}', function (User $author) {
//     return view('posts', [
//         'active' => 'c',
//         'title' => 'By ' . $author->username,
//         'posts' => $author->posts->load('category', 'author'),
//     ]);
// });
