<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    public static $wrap = null;

    public function toArray(Request $request): array
    {
        /** @var Cart $this */
//        dd($this->items->pluck('product'));
//        dd($this->items);
        return [
            'cart_id'     => $this->id,
            'user_id'     => $this->user_id,
            'total_items' => $this->items->sum('quantity'),
//            'total_sum'   => $this->items->pluck('product')->pluck('price')->sum(function ($item) {
//                return $item->quantity * $item->price;
//            }),
            'items'       => $this->items->map(function ($item) {
                return ['quantity' => $item->quantity, 'items' => $item->product];
            }),

        ];
    }
}
