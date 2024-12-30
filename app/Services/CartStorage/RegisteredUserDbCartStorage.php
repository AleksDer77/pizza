<?php

declare(strict_types=1);

namespace app\Services\CartStorage;

use App\Models\Cart;
use App\Models\CartItem;
use App\Services\CartService\CartDtoService;

/**
 * @property string|null $token
 */
readonly class RegisteredUserDbCartStorage implements CartStorageInterface
{
    public function __construct(private CartDtoService $dtoService)
    {
    }

    public function load(): array
    {
        $cartId = Cart::query()->where('user_id', auth('sanctum')->id())->value('id');

        $items = CartItem::where('cart_id', $cartId)
            ->whereHas('product', function ($query) {
                $query->where('available', true);
            })
            ->get()
            ->load('product');

        dd($items);
        if (!$items->isEmpty()) {
            return $this->getCartItemDto($items);
        }

        return [];
    }

    private function getCartItemDto($items): array
    {
        $res = [];

        foreach ($items as $item) {
            $res[] = $this->dtoService->createProductDto($item);
        }

        return $res;
    }


    public function save(): void
    {
        // TODO: Implement saveItems() method.
    }

}
