<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallNumber extends Model
{
    use HasFactory;

    protected $fillable = [
        'call_number',
        'parent_id',
        'sub_parent_id',
        'call_name'
    ];

    public function book()
    {
        return $this->hasMany(Book::class);
    }
}
