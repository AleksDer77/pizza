<?php

declare(strict_types=1);

namespace App\Dto;

use Illuminate\Support\Collection;

final class CartDto
{
    public function __construct(
        public int $totalItems = 0,
        public int $totalSum = 0,
        public array $items = []
    ) {
    }
}
