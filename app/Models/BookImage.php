<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_url',
    ];

    public function qrBookImage()
    {
        return $this->hasMany(BookImage::class);
    }


}
