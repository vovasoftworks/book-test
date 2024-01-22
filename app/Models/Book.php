<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $cover_url
 * @property float $price
 * @property int $quantity
 */
class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'cover_url',
        'price',
        'quantity'
    ];

    protected $casts = [
        'title' => 'string',
        'description' => 'string',
        'cover_url' => 'string',
        'price' => 'float',
        'quantity' => 'int',
    ];

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(
            Author::class,
            'author_books',
            'book_id',
            'author_id'
        );
    }
}
