<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchAuthorRequest extends FormRequest
{
    private const SEARCH = 'search';

    public function rules(): array
    {
        return [
            self::SEARCH => [
                'required',
                'string'
            ]
        ];
    }

    public function getFullName(): string
    {
        return $this->query(self::SEARCH);
    }
}
