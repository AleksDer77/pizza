<?php

declare(strict_types=1);

namespace App\Services\CartService;

use App\Dto\CartDto;
use App\Dto\ProductDto;
use App\Models\CartItem;
use App\Models\Product;

class CartDtoService
{
    public function __construct()
    {
    }

    /** @param  ProductDto[]  $data */
    public function createCartDto(array $data): CartDto
    {
        $totalItems = 0;
        $totalPrice = 0;

        foreach ($data as $item) {
            $totalItems += $item->quantity;
            $totalPrice += $item->price * $item->quantity;
        }

        return new CartDto(
            $totalItems,
            (int) $totalPrice,
            $data
        );
    }

    public function createProductDto(Product|CartItem|null $data, ?int $quantity = 1): ProductDto
    {
        if ($data instanceof Product) {
            return $this->createItemDto($data, $quantity);
        }

        if ($data instanceof CartItem) {
            return $this->createCartItemDto($data);
        }

        throw new \InvalidArgumentException('Invalid data type');
    }

    private function createCartItemDto($data): ProductDto
    {
        return new ProductDto(
            productId: $data->product->id,
            categoryId: $data->product->category->id,
            name: $data->product->name,
            price: ($data->product->price) / 100,
            totalPrice: ($data->product->price * $data->quantity) / 100,
            quantity: $data->quantity,
            imageUrl: $data->product->image_url,
            currency: Product::CURRENCY_RU,
        );
    }

    private function createItemDto(Product $data, $quantity): ProductDto
    {
        return new ProductDto(
            productId: $data->id,
            categoryId: $data->category->id,
            name: $data->name,
            price: ((int) $data->price)/100,
            totalPrice: ((int) $data->price * $quantity) / 100,
            quantity: $quantity,
            imageUrl: $data->image_url,
            currency: Product::CURRENCY_RU,
        );
    }
}
