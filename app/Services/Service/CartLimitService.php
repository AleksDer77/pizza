<?php

declare(strict_types=1);

namespace App\Services\Service;

use App\Dto\ProductDto;
use http\Exception;

class CartLimitService
{
    private array $cartLimit;

    public function __construct(array $cartLimit)
    {
        $this->cartLimit = $cartLimit;
    }

    public function checkCount(array $cartItems, ProductDto $productDto): true | \LogicException
    {
        $addedProductCategory = $productDto->categoryId;
        $totalProductsInCategory = $this->getTotalProductsInCategory($cartItems, $addedProductCategory);

//        return
//            ($totalProductsInCategory + $productDto->quantity) < $this->getLimitCategory($addedProductCategory)
//            ?? throw new \LogicException('Och Och Och');
        if (($totalProductsInCategory + $productDto->quantity) <= $this->getLimitCategory($addedProductCategory)) {
            return true;
        }
        throw new \LogicException('Och Och och');
    }

    private function getTotalProductsInCategory(array $cartItems, int $categoryId): int
    {
        $count = 0;
        foreach ($cartItems as $cartItem) {
            if ($cartItem->categoryId === $categoryId) {
                $count += $cartItem->quantity;
            }
        }
        return $count;
    }

    private function getLimitCategory(int $id): int
    {
        return $this->cartLimit[$id] ?? 0;
    }
}
