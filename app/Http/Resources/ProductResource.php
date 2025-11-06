<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
public function toArray(Request $request): array
{
    return [
        'id' => $this->id,
        'brand' => new BrandResource($this->whenLoaded('brand')),
        'name' => $this->name,
        'slug' => $this->slug,
        'description' => $this->description,
        'price' => $this->price,
        'thumbnail_url' => $this->thumbnail_url,
        'detail' => [
            'sku' => $this->detail->sku ?? null,
            'stock' => $this->detail->stock ?? null,
            'specs' => $this->detail->specs ?? null,
        ],
    ];
}
}
