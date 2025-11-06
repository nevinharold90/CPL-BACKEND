<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReadWalkIn extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'client_id'
    ];

    public function book(){
        return $this->hasMany(Book::class);
    }
    public function client(){
        return $this->hasMany(Client::class);
    }
}
