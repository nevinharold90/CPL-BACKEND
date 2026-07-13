<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'barcode_data',
        'qrcode_data',
        'accession_number_id',
        'user_id',
        'isbn',
        'title',
        'status',
        'condition',
        'source_of_fund',
    ];


    public function bookAuthor()
    {
        return $this->hasMany(BookAuthor::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bookClassification()
    {
        return $this->hasMany(BookClassification::class);
    }

    public function readSession()
    {
        return $this->hasMany(ReadSession::class);
    }

    public function bookCopies()
    {
        return $this->hasMany(BookCopies::class);
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
