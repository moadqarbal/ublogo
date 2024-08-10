<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blogpost extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'title', 
        'slug',
        'content', 
        'categories', 
        'tags', 
        'meta_description', 
        'meta_robots', 
        'canonical_url', 
        'additional_scripts'
    ];

    public function user()
    { 
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'blogpost_category');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blogpost_tag');
    }


}
