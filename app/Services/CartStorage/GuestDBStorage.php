<?php

declare(strict_types=1);

namespace App\Services\CartStorage;

use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

readonly class GuestDBStorage implements CartStorageInterface
{
    public function __construct(private string $token)
    {
    }

    public function load()
    {
        $cartId = DB::table('temporary_carts')->where('token_id', $this->token)->value('id');
        $items = DB::table("temporary_cart_items")->where("temporary_cart_id", $cartId)->get();
        $products = Product::whereIn("id", $items->pluck("product_id"))->get();
        dd($products);
        return $products;
    }

    public function save()
    {
        // TODO: Implement saveItems() method.
    }
}
