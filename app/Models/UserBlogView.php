<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBlogView extends Model
{
    protected $fillable = ['user_id', 'blog_id', 'viewed_at'];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
