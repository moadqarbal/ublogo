<?php

namespace App\Models;

use App\Models\User;
use App\Models\Blogpost;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['blogpost_id' , 'user_id' , 'comment'];

    public function user()
    { 
        return $this->belongsTo(User::class);
    }

    public function blogpost()
    { 
        return $this->belongsTo(Blogpost::class);
    }
}
