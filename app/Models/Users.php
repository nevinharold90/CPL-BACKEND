<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id_no',
        'username',
        'last_name',
        'first_name',
        'middle_name',
        'email',
        'password',
        'status',
        'c_number',
        'role',
    ];

        protected $hidden = [
        'password',
        'remember_token',
    ];

        protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function book()
    {
        return $this->hasMany(Book::class);
    }

    public function readBorrowersCard()
    {
        return $this->hasMany(ReadBorrowersCard::class);
    }

    public function readWalkIn()
    {
        return $this->hasMany(ReadWalkIn::class);
    }

    public function client()
    {
        return $this->hasMany(Client::class);
    }

    public function membership()
    {
        return $this->hasMany(Membership::class);
    }

    public function log()
    {
        return $this->belongsTo(Log::class);
    }

}
