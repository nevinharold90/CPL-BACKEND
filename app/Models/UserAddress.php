<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'province',
        'city',
        'barangay_subdivision',
        'street',
        'zip_code'
    ];

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }
}
