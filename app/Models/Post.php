<?php
// app/Models/Post.php

namespace App\Models;
use App\Models\Profile;
use App\models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = ['user_id', 'category_id', 'title', 'body', 'is_featured', 'thumbnail'];

    public function user()
    {
        return $this->belongsTo(Profile::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    }
