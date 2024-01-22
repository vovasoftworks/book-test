<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchBookRequest extends FormRequest
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

    public function getSearchBookBy(): string
    {
        return $this->query(self::SEARCH);
    }
}
