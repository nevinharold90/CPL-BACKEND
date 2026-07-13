<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{

    // THIS IS UNDER TO BE DISCUSSED!
    protected $fillable = [

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
