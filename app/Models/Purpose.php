<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purpose extends Model
{
    use HasFactory;

    protected $fillable = [
        'visit_id',
        'purpose',
        'room',
    ];

    public function visits()
    {
        return $this->belongsTo(Visit::class);
    }

}
