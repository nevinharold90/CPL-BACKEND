<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'birthdate',
        'c_number',
        'sex',
        'organization',
        'address',
        'member_status'
    ];

    public function clientRemarks()
    {
        return $this->hasMany(ClientRemarks::class);
    }
    public function readBorrowersCard()
    {
        return $this->belongsTo(ReadBorrowersCard::class);
    }

    public function readWalkIn()
    {
        return $this->belongsTo(ReadWalkIn::class);
    }
    public function visit()
    {
        return $this->hasMany(Visit::class);
    }
}
