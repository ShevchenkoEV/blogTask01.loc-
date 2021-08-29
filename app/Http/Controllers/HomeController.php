<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with(['category','tags', 'comments', 'author'])->orderBy('id', 'desc')->paginate(3);
        return view('front.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::with('author', 'comments')->where('slug', $slug)->firstOrFail();
        $post->view += 1;
        $post->update();
        return view('front.post.show', compact('post'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->with('category','tags')->orderBy('id','desc')->paginate(2);
        return view('front.list.list_categories', compact('posts', 'category'));
    }

    public function tag($slug)
    {
        $tag = Tag::where('slug',$slug)->firstOrFail();
        $posts = $tag->posts()->with('category', 'tags')->orderBy('id', 'desc')->paginate(4);
        return view('front.list.list_tags', compact('posts', 'tag'));
    }

    public function search(Request $request)
    {
        $request->validate([
            's' => 'required'
        ]);
        $s = $request->s;
        $posts = Post::where('title', 'LIKE', "%{$s}%")->with('category')->paginate(2);
        return view('front.list.list_search', compact('posts', 's'));
    }
}
