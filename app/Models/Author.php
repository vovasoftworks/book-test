<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $rank
 * @property string $avatar_url
 */
class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'rank',
        'avatar_url',
    ];

    protected $casts = [
        'first_name' => 'string',
        'last_name' => 'string',
        'rank' => 'string',
        'avatar_url' => 'string',
    ];

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(
            Book::class,
            'author_books',
            'author_id',
            'book_id'
        );
    }
}
