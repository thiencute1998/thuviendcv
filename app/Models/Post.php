<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Table tin tuc
    protected $table = 'books';

    protected $fillable = ['name', 'slug', 'status', 'content', 'image', 'category_id', 'views', 'author', 'title', 'keywords', 'description','bookcontents'
        , 'subtitle', 'author', 'book_authorsymbol', 'category_name', 'book_language', 'book_number', 'book_episode', 'order'];

    public $timestamps = true;
    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function bookVersion() {
        return $this->hasMany(BookVersion::class, 'posts_id', 'id');
    }
}
