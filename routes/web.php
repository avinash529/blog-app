<?php
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\BlogViewController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $viewedBlogIds = \App\Models\UserBlogView::where('user_id', auth()->id())
                        ->distinct('blog_id')
                        ->pluck('blog_id');
    
    $viewed = $viewedBlogIds->count();
    $total = \App\Models\Blog::count();
    $new = \App\Models\Blog::whereNotIn('id', $viewedBlogIds)->count();
    
    $recentBlogs = \App\Models\Blog::latest()->get();
    
    return view('dashboard', compact('total', 'viewed', 'new', 'recentBlogs'));
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('admin/users', UserController::class);
    Route::resource('admin/blogs', BlogController::class)->except(['show']);
});


Route::middleware('auth')->group(function () {
    Route::get('/blogs', [BlogViewController::class, 'index'])->name('blogs.user.index');
    Route::get('/blogs/{slug}', [BlogViewController::class, 'show'])->name('blogs.user.show');
    Route::post('/blogs/{slug}/view', [BlogViewController::class, 'ajaxView'])->name('blogs.user.view');
    Route::get('/blogs/{slug}/content', [BlogViewController::class, 'content'])->name('blogs.user.content');
});




require __DIR__.'/auth.php';
