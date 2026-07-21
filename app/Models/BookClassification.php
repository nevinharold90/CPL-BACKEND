<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookClassification extends Model
{
    protected $fillable = [
        'book_id',
        'dewey_decimal_id',
        'book_type',
        'cutter',
        'category',
        'year_published',
        'location'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function deweyDecimal()
    {
        return $this->belongsTo(DeweyDecimal::class, 'dewey_decimal_id');
    }
}
