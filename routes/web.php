<?php

// use App\Models\Post;
// use App\Models\User;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\CatergoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', fn () =>  view('home', [
    'active' => 'h',
    'title' => 'Home',
    'name' => 'Rei'
]));

Route::get('/about', [AboutController::class, 'index']);
Route::get('/blog', [PostController::class, 'index']);
Route::get('/posts', [PostController::class, 'index']);

//ambil apappun didalam /
Route::get('posts/{post:slug}', [PostController::class, 'detail']);
Route::get('/category', [CatergoryController::class, 'index']);

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login')->middleware('guest');
    Route::post('/login', 'auth');
    Route::post('/logout', 'exit');
});

Route::controller(RegController::class)->group(function () {
    Route::get('/register', 'index')->middleware('guest');
    Route::post('/register', 'store');
});

Route::resource('/profile', ProfileController::class)->middleware('auth');

Route::get('/new', [DashboardController::class, 'create'])->name('new')->middleware('auth');
Route::resource('/{username}/posts', DashboardController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class);
Route::resource('/dashboard/roles', AdminRoleController::class)->middleware('admin');



// Route::get('/dashboard/categories/new', [AdminCategoryController::class, 'create']);
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
