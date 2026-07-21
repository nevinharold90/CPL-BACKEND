<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'title',
        'image_url',
        'isbn'
    ];


    public function bookAuthor()
    {
        return $this->belongsToMany(BookAuthor::class, 'book_authors', 'book_id', 'author_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function authors()
{
    return $this->belongsToMany(Author::class, 'book_authors', 'book_id', 'author_id')
                ->using(BookAuthor::class);
}

    public function bookClassification()
    {
        return $this->belongsTo(BookClassification::class, 'book_id');
    }
    public function readSession()
    {
        return $this->hasMany(ReadSession::class);
    }

    public function bookCopy()
    {
        return $this->hasMany(BookCopy::class, 'book_id');
    }

    // public function bookCover()
    // {
    //     return $this->hasMany(BookCover::class);
    // }

    // public function readBorrowersCard()
    // {
    //     return $this->hasMany(ReadBorrowersCard::class);
    // }


    // public function callNumber()
    // {
    //     return $this->belongsTo(CallNumber::class);
    // }

    // public function readWalkIn()
    // {
    //     return $this->hasMany(ReadWalkIn::class);
    // }

// Sample
    // public function qrBookImages()
    // {
    //     return $this->hasMany(QrBookImage::class);
    // }

}
