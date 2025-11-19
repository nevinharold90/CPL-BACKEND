<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReadBorrowersCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'client_id',
        'return_status',
        'condition',
        'due_date',
    ];

        public function client(){
            return $this->belongsTo(Client::class);
        }

        public function book()
        {
            return $this->belongsTo(Book::class);
        }

        public function user()
        {
            return $this->belongsTo(Users::class);
        }
}
