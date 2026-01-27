<?php
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\BlogViewController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
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
