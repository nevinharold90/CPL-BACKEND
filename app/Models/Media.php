<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
        'message_id',
        'media_url',
    ];

    public function message()
    {
        return $this->belongsTo(Message::class, 'message_id');
    }
}
