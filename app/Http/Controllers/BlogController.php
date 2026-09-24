<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = BlogPost::latest();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $posts = $query->paginate(6);
        $recentPosts = BlogPost::latest()->take(5)->get();

        return view('blog.index', compact('posts', 'recentPosts'));
    }

    public function show($slug)
    {
        $post = BlogPost::where('slug', $slug)->firstOrFail();
        $recentPosts = BlogPost::where('id', '!=', $post->id)->latest()->take(4)->get();
        return view('blog.show', compact('post', 'recentPosts'));
    }
}
