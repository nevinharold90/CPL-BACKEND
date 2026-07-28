<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookClassification extends Model
{
    protected $fillable = [
        'book_id',
        'dewey_decimal_id',
        'book_type',
        'cutter',
        'category',
        'year_published',
        'place_of_publication'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function deweyDecimal()
    {
        return $this->belongsTo(DeweyDecimal::class, 'dewey_decimal_id');
    }

    protected function callNumber(): Attribute
    {
        return Attribute::make(
            get: function () {
                $prefix = strtolower($this->book_type) === 'fiction'
                    ? 'F' // Use 'FIC' or 'F/FIC' depending on your standard
                    : optional($this->deweyDecimal)->dd_number;

                return trim("{$prefix} {$this->cutter} {$this->year_published}");
            }
        );
    }
}
