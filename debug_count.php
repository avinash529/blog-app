<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$count = \App\Models\Blog::count();
echo "Total Blogs: " . $count . "\n";

$blogs = \App\Models\Blog::latest()->take(10)->get();
echo "Recent Blogs (" . $blogs->count() . "):\n";
foreach ($blogs as $blog) {
    echo "- " . $blog->id . ": " . $blog->title . "\n";
}
