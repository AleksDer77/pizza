<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use app\Services\CartService\CartService;
use Illuminate\Http\Request;

//use App\Services\CartService\CartService;

class CartController extends Controller
{

    public function __construct(public CartService $cartService)
    {
    }

    public function index()
    {
//       dd(request()->header());
        return $this->cartService->getUser();
    }

    public function addToCart($id, $quantity = 1)
    {
          $this->cartService->add($id, $quantity);
//        $product = Product::findOrFail($id);
//        $this->cartService->add($product->id, $quantity);
//        $cart = Cart::firstOrCreate(['user_id' => Auth::id()])->load('items');
//        $cartItem = $cart->items->firstWhere('product_id', $id);
//
//        if (!$cartItem) {
//
//        }
//        $categoryId = $cartItem->category_id;
//
//        $categoryName = Category::find($cartItem->category_id)->name;
//        $productCountOfCartItem = $cart->items->filter(function ($item) use ($categoryId) {
//            return $categoryId === $item->category_id;
//        })->sum('quantity');
//
//        $cart->validateProductCountLimit($cartItem, $categoryName, self::class, __FUNCTION__);
//        if (!$cartItem) {
//            $productModel = Product::find($id);
//
//            $cart->items->create([
//                    'cart_id'     => $cart->id,
//                    'product_id'  => $id,
//                    'category_id' => $productModel->category_id,
//                    'quantity'    => $quantity,
//                    'price'       => $productModel->price,
//                ]
//            );
//        } else {
//            $cartItem->quantity += $quantity;
//            $cartItem->save();
//        }
//        return $this->index();
    }
}
