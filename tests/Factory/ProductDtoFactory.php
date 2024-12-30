<?php

declare(strict_types=1);

namespace Tests\Factory;

use App\Dto\ProductDto;

class ProductDtoFactory
{
    public static function make(array $data = []): ProductDto
    {
        return new ProductDto(
            productId: $data['id'] ?? 1,
            categoryId: $data['categoryId'] ?? 1,
            name: $data['name'] ?? 'test product',
            price: $data['price'] ?? 1,
            totalPrice: $data['total_price'] ?? 1,
            quantity: $data['quantity'] ?? 1,
            imageUrl: $data['image_url'] ?? 'https://example.com/image.jpg',
            currency: $data['currency'] ?? 'RUB',
        );
    }
}
