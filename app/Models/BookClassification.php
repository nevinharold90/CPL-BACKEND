<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookClassification extends Model
{
    protected $fillable = [
        'book_id',
        'call_number_id',
        'type',
        'cutter',
        'year_published',
        'location'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function callNumber()
    {
        return $this->belongsTo(CallNumber::class, 'call_number_id');
    }
}
