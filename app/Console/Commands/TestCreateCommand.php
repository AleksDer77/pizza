<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Exceptions\ResourceNotFoundException;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use app\Services\CartService\CartService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TestCreateCommand extends Command
{
    protected $signature = 'test:command';

    protected $description = 'Command description';

    /**
     * @throws ResourceNotFoundException
     */
    public function handle(): void
    {
DB::enableQueryLog();
$items = Cart::with('items')->where('user_id', 1)->get()->toArray();
//        $items = CartItem::where('cart_id', 1)->whereHas('product', function ($query) {
//           $query->where('available', true);
//        })->get()->load('product')->toArray();
//        $items = CartItem::where('cart_id', 1)->get()->load('product');
dd($items);
dd(DB::getQueryLog());
    }

}
