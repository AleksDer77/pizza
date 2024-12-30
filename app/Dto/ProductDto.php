<?php

declare(strict_types=1);

namespace App\Dto;

final class ProductDto
{
    public function __construct(
        public int $productId,
        public int $categoryId,
        public string $name,
        public int $price,
        public int $totalPrice,
        public int $quantity,
        public string $imageUrl,
        public string $currency,
    ) {
    }
}
