<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\CartService\CartDtoService;
use app\Services\CartService\CartService;
use Illuminate\Http\JsonResponse;

class CartController extends Controller
{
    public function __construct(
        public CartService $cartService,
        private readonly CartDtoService $cartDtoService,
    ) {
    }

    public function index(): JsonResponse
    {
        $cart = $this->cartService->getCart();

        return response()->json([$this->cartDtoService->createCartDto($cart), 200]);
    }

    public function addToCart($id, $quantity = 1): void
    {
        $product = Product::findOrFail($id);
        $productDto = $this->cartDtoService->createProductDto($product, $quantity);
        $this->cartService->add($productDto);
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
