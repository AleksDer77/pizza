<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        /** @var Product $this */
        return [
            $this->mergeWhen($request->user()?->isAdmin(), [
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
                'available'  => $this->available,
                'featured'   => $this->featured,
            ]),
            'id'         => $this->id,
            'category_id' => $this->category_id,
            'name'        => $this->name,
            'description' => $this->description,
            'price'       => $this->price,
            'image_url'   => $this->image_url,
        ];
    }
}
