<?php
namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\UserBlogView;
use Illuminate\Http\Request;

class BlogViewController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();

        $viewed = UserBlogView::where('user_id', auth()->id())
                              ->pluck('blog_id')
                              ->toArray();

        return view('blogs.index', compact('blogs', 'viewed'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();

        UserBlogView::firstOrCreate([
            'user_id' => auth()->id(),
            'blog_id' => $blog->id,
        ], [
            'viewed_at' => now(),
        ]);

        return view('blogs.show', compact('blog'));
    }

    public function ajaxView($slug)
{
    $blog = Blog::where('slug', $slug)->firstOrFail();

    UserBlogView::firstOrCreate([
        'user_id' => auth()->id(),
        'blog_id' => $blog->id,
    ], [
        'viewed_at' => now(),
    ]);

    return response()->json([
        'status' => 'ok'
    ]);
}

public function content($slug)
{
    $blog = Blog::where('slug', $slug)->firstOrFail();

    return response()->json([
        'title' => $blog->title,
        'content' => nl2br(e($blog->content)),
    ]);
}


}
