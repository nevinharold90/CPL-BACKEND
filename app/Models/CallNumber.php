<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallNumber extends Model
{
    use HasFactory;

    protected $fillable = [
            'call_number',
            'call_name'
        ];

    public function bookClassification()
    {
        return $this->hasMany(BookClassification::class);
    }
}
