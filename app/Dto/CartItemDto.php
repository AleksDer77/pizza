<?php

declare(strict_types=1);

namespace App\Dto;

final class CartItemDto
{
    public function __construct(
        public int $id,
        public int $productId,
        public int $quantity,
        public int $categoryId,
        public string $name,
        public string $price,
        public string $imageUrl,
    ) {
    }
}
