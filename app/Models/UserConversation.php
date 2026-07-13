<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserConversation extends Model
{
    protected $fillable = [
        'conversation_id',
        'user_id',
        'last_read_at',
        'isAdmin'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function conversation()
    {
        return $this->belongsTo(Conversation::class, 'conversation_id');
    }
}
