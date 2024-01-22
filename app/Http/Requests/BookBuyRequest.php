<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookBuyRequest extends FormRequest
{
    private const BOOK_ID = 'book_id';
    private const AUTHOR_ID = 'author_id';
    private const MONEY = 'money';

    public function rules(): array
    {
        return [
            self::BOOK_ID => [
                'required',
                'int'
            ],
            self::AUTHOR_ID => [
                'required',
                'int'
            ],
            self::MONEY => [
                'required',
                'numeric'
            ]
        ];
    }

    public function getAuthorId(): int
    {
        return $this->get(self::AUTHOR_ID);
    }

    public function getBookId(): int
    {
        return $this->get(self::BOOK_ID);
    }

    public function getMoney(): float
    {
        return $this->get(self::MONEY);
    }
}
