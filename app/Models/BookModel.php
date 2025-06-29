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
        'author_id',
        'publication_year',
        'genre',
    ];

    public function author()
    {
        return $this->belongsTo(AuthorModel::class, 'author_id');
    }
}
