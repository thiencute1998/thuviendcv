<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookFavorite extends Model
{
    use HasFactory;

    protected $table = "book_favorites";

    protected $fillable = ['user_id', 'book_id'];

    public $timestamps = true;


    public function book() {
        return $this->belongsTo(Post::class, 'book_id', 'id');
    }
}
