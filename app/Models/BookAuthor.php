<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot; // 👈 Import Pivot

class BookAuthor extends Pivot
{
    protected $table = 'book_authors';

    protected $fillable = [
        'book_id',
        'author_id',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
    public function books()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

}
