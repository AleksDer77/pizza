<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Database\Seeders\CartSeeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Random\RandomException;

class CartItemFactory extends Factory
{
    protected $model = CartItem::class;

    /**
     * @throws RandomException
     */
    public function definition(): array
    {
        $product_id = random_int(1, Product::count());

        return [
            'cart_id' => random_int(1, Cart::count()),
            'product_id' => $product_id,
            'price' => Product::find($product_id)->price,
            'quantity' => random_int(1, 10),
        ];
    }
}
