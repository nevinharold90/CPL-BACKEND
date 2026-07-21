<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeweyDecimal extends Model
{
    protected $fillable = [
        'dd_number',
        'dd_name'
    ];

    public function bookClassification()
    {
        return $this->hasMany(BookClassification::class);
    }
}
