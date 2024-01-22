<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'first_name' => $this->resource->first_name,
            'last_name' => $this->resource->last_name,
            'rank' => $this->resource->rank,
            'avatar_url' => $this->resource->avatar_url,

            'created_at' => $this->resource->created_at ? $this->resource->created_at->format("Y-m-d H:i:s") : null,
            'updated_at' => $this->resource->updated_at ? $this->resource->updated_at->format("Y-m-d H:i:s") : null,
        ];
    }
}
