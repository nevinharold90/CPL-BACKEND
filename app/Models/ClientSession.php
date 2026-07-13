<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCredential extends Model
{
    protected $fillable = [
        'last_name',
        'first_name',
        'middie_initial',
        'organization/office',
        'address',
        'role'
    ];

    public function readSessions()
    {
        return $this->hasMany(ReadSession::class);
    }

    public function clientRemarks()
    {
        return $this->hasMany(ClientRemarks::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_credentials_id');
    }

    public function visit()
    {
        return $this->hasMany(Visit::class);
    }
}
