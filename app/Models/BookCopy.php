<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookCopy extends Model
{
    protected $fillable = [
        'book_id',
        'barcode_data',
        'qrcode_data',
        'accession_number_id',
        'category',
        'location',
        'condition',
        'source_of_fund',
        'status',
        'material_type'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
