<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientRemarks extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'remark',
    ];

    public function remarks()
    {
        return $this->belongsTo(ClientRemarks::class);
    }
}
