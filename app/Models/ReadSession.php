<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReadSession extends Model
{
    protected $fillable = [
        'book_id',
        'client_session_id',
        'reading_type',
        'return_status',
        'read_date',
        'return_date',
    ];

    public function user()
    {
        // return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function userCredential()
    {
        return $this->belongsTo(UserCredential::class);
    }

}
