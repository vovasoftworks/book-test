<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $author_id
 * @property int $book_id
 * @property float $price
 */
class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'book_id',
        'price',
    ];

    protected $casts = [
        'author_id' => 'int',
        'book_id' => 'int',
        'price' => 'float',
    ];

    public function books(): BelongsTo
    {
        return $this->belongsTo(
            Book::class,
            'id',
            'book_id'
        );
    }

}
