<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookModel extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = [
        'title', 
        'author',
        'publication_year',
        'genre',
        'created_at',
        'updated_at',
        'body'
    ];
}
