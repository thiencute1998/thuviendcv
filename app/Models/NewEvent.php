<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewEvent extends Model
{
    use HasFactory;

    // Table lich phung vu
    protected $table = 'news';

    protected $fillable = ['name', 'content', 'slug', 'new_type', 'status', 'views', 'image', 'title', 'keywords', 'description', 'order'];

    public $timestamps = true;
}
