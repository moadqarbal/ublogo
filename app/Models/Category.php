<?php

namespace App\Models;

use App\Models\Blogpost;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function blogposts()
    {
        return $this->belongsToMany(Blogpost::class, 'blogpost_category');
    }
}
