<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'title' => $this->resource->title,
            'description' => $this->resource->description,
            'cover_url' => $this->resource->cover_url,
            'price' => $this->resource->price,
            'quantity' => $this->resource->quantity,

            'created_at' => $this->resource->created_at ? $this->resource->created_at->format("Y-m-d H:i:s") : null,
            'updated_at' => $this->resource->updated_at ? $this->resource->updated_at->format("Y-m-d H:i:s") : null,
        ];
    }
}
