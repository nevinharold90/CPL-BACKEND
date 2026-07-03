<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{

    // THIS IS UNDER TO BE DISCUSSED!
    protected $fillable = [
        'title',
        'description',
        'date',
    ];
}
