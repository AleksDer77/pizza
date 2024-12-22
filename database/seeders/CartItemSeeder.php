<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Random\RandomException;

class CartItemSeeder extends Seeder
{
    /**
     * @throws RandomException
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; ++$i) {
            $product_id = random_int(1, Product::count());
            DB::table('cart_items')->insert(values: [
                [
                    'cart_id'    => random_int(1, Cart::count()),
                    'product_id' => $product_id,
                    'quantity'   => random_int(1, 3),
                ],
            ]);
        }
    }
}
