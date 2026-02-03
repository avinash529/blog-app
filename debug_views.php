<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$users = \App\Models\User::all();

foreach ($users as $user) {
    echo "User ID: " . $user->id . " (" . $user->name . ")\n";
    
    $viewedBlogIds = \App\Models\UserBlogView::where('user_id', $user->id)
                        ->distinct('blog_id')
                        ->pluck('blog_id');
    
    echo "  Viewed Count: " . $viewedBlogIds->count() . "\n";
    echo "  Blog IDs: " . implode(', ', $viewedBlogIds->toArray()) . "\n";
}

$totalEntries = \App\Models\UserBlogView::count();
echo "\nTotal entries in user_blog_views table: " . $totalEntries . "\n";
