<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = [
        'creator_id',
        'title',
        'type', //private or group
        'description', //optional
        'image_url', //optional
    ];

    public function userConversations()
    {
        return $this->belongsTo(UserConversation::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
