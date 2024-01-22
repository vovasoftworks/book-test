<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $author_id
 * @property int $book_id
 */
class AuthorBook extends Model
{
    protected $fillable = [
        'author_id',
        'book_id',
    ];

    protected $casts = [
        'author_id' => 'int',
        'book_id' => 'int',
    ];
}
