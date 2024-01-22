<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    private const ID = 'id';
    private const TITLE = 'title';
    private const DESCRIPTION = 'description';
    private const COVER_URL = 'cover_url';
    private const PRICE = 'price';
    private const QUANTITY = 'quantity';

    public function rules(): array
    {
        return [
            self::TITLE => [
                'string',
            ],
            self::DESCRIPTION => [
                'string'
            ],
            self::COVER_URL => [
                'string'
            ],
            self::PRICE => [
                'numeric'
            ],
            self::QUANTITY => [
                'integer'
            ]
        ];
    }

    public function getBookId()
    {
        return $this->route(self::ID);
    }

    public function getTitle(): string|null
    {
        return $this->get(self::TITLE);
    }

    public function getDescription(): string|null
    {
        return $this->get(self::DESCRIPTION);
    }

    public function getCoverUrl(): string|null
    {
        return $this->get(self::COVER_URL);
    }

    public function getPrice(): float|null
    {
        return $this->get(self::PRICE);
    }

    public function getQuantity(): int|null
    {
        return $this->get(self::QUANTITY);
    }

}
