<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// Mimic the new dashboard logic
$recentBlogs = \App\Models\Blog::latest()->get();

echo "Blogs retrieved via new logic: " . $recentBlogs->count() . "\n";
echo "Total in DB: " . \App\Models\Blog::count() . "\n";

if ($recentBlogs->count() === \App\Models\Blog::count()) {
    echo "SUCCESS: Retrieved all blogs.\n";
} else {
    echo "FAILURE: Count mismatch.\n";
}
