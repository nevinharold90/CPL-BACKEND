<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookAuthor extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'author_id',
    ];

    public function author()
    {
        return $this->hasMany(Author::class);
    }
    public function books()
    {
        return $this->hasMany(Book::class);
    }

}
