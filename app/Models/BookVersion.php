<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookVersion extends Model
{
    use HasFactory;

    protected $table = 'book_version';
    protected $fillable = ['posts_id', 'book_code', 'book_publisher', 'book_yearpublication', 'book_size', 'book_numberpages', 'book_warehouse', 'book_status'];

    public $timestamps = false;
}
