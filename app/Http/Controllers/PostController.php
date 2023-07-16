<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;

class PostController extends Controller
{


    public function index()
    {
        $title = '';
        if (request('c')) {
            $c = Category::firstWhere('slug', request('c'));
            $title = ' in ' . $c->name;
        }

        if (request('a')) {
            $a = User::firstWhere('username', request('a'));
            $title = ' by ' . $a->name;
        }

        return view('posts', [
            'active' => 'p',
            'title' => 'All Posts ' . $title,
            'posts' => Post::latest()->filter(request(['s', 'c', 'a']))->paginate(9)->withQueryString()
        ]);
    }

    public function detail(Post $post)
    {
        return view('post', [
            'active' => 'p',
            'title' => 'Post | ' . $post->title,
            'post' => $post
        ]);
    }
}
