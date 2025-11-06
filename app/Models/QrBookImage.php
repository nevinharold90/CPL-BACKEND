<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrBookImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_image_id',
        'book_id',
    ];

    public function bookImage()
    {
        return $this->belongsTo(BookImage::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
