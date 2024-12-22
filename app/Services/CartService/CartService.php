<?php

declare(strict_types=1);

namespace app\Services\CartService;

use app\Services\CartStorage\CartStorageInterface;

class CartService
{
    public function __construct(public CartStorageInterface $cartStorage)
    {
    }

    public function getCart()
    {
        return $this->cartStorage->getItems();
    }

    public function add($id, $quantity)
    {
        $cartItems = $this->loadItems();
    }

    private function loadItems()
    {
        return $this->cartStorage->getItems();
    }

    public function getUser()
    {
        return $this->cartStorage->getUser();
   }
    private function saveItems($id): void
    {
        $this->cartStorage->saveItems($id);
    }
}
