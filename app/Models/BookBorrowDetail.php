<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookBorrowDetail extends Model
{
    use HasFactory;

    protected $table = "book_borrow_details";

    protected $fillable = ["book_code", "book_name", "book_page", "booK_ddc", "book_author", "book_borrow_id"];

    public $timestamps = false;

}
