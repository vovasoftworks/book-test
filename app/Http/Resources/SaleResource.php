<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SaleResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'book_id' => $this->resource->book_id,
            'author_id' => $this->resource->author_id,
            'price' => $this->resource->price,

            'created_at' => $this->resource->created_at ? $this->resource->created_at->format("Y-m-d H:i:s") : null,
            'updated_at' => $this->resource->updated_at ? $this->resource->updated_at->format("Y-m-d H:i:s") : null,
        ];
    }
}
