<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCredential extends Model
{
    protected $fillable = [
        'last_name',
        'first_name',
        'middle_name',
        'organization_office',
        'address',
        'role',
        'c_number',
        'has_account',
        'office_address',
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
        return $this->hasMany(Users::class, 'user_credentials_id');
    }

    public function visit()
    {
        return $this->hasMany(Visit::class);
    }
}
