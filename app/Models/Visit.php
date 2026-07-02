<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'visit_date',
    ];


    public function purpose(){
        return $this->hasMany(Purpose::class);
    }

    public function userCredential(){
        return $this->belongsTo(UserCredential::class);
    }
}
