<?php

namespace App\Http\Requests;

use App\Enums\SortByEnum;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class GetSoldBooksRequest extends FormRequest
{
    private const SEARCH_BY = 'search_by';
    private const SORT_BY = 'sort_by';

    public function rules(): array
    {
        return [
            self::SEARCH_BY => [
                'string'
            ],
            self::SORT_BY => [
                'string',
                Rule::in(SortByEnum::COLUMNS)
            ]
        ];
    }

    public function getSearchBY(): string|null
    {
        return $this->get(self::SEARCH_BY);
    }

    public function getSortBy(): string|null
    {
        return $this->get(self::SORT_BY);
    }
}
