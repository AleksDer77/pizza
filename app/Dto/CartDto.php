<?php

declare(strict_types=1);

namespace App\Dto;

final class CartDto
{
    /**
     * @param  int  $id
     * @param  int  $totalItems
     * @param  int  $totalSum
     * @param  CartItemDto[] $items
     */
    public function __construct(
        public int $id,
        public int $totalItems = 0,
        public int $totalSum = 0,
        public array $items = [],
    ) {
    }
}
