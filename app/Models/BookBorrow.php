<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookBorrow extends Model
{
    use HasFactory;

    protected $table = "book_borrows";

    protected $fillable = ["user_code", "user_name", "user_email", "user_phone", "user_address"];

    public $timestamps = true;
}
