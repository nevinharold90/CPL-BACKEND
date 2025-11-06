<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'qr_data',
        'accession_number_id',
        'call_number_id',
        'title',
        'status',
        'year_published',
    ];

    public function qrBookImages()
    {
        return $this->hasMany(QrBookImage::class);
    }

    public function bookAuthor()
    {
        return $this->belongsTo(BookAuthor::class);
    }

    public function readBorrowersCard()
    {
        return $this->hasMany(ReadBorrowersCard::class);
    }

    public function readWalkIn()
    {
        return $this->belongsTo(ReadWalkIn::class);
    }

    public function callNumber()
    {
        return $this->belongsTo(CallNumber::class);
    }

// Sample
    // public function qrBookImages()
    // {
    //     return $this->hasMany(QrBookImage::class);
    // }

}
