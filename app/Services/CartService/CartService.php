<?php

declare(strict_types=1);

namespace app\Services\CartService;

use App\Dto\ProductDto;
use app\Services\CartStorage\CartStorageInterface;
use App\Services\Service\CartLimitService;

class CartService
{
    /**
     * @var ProductDto[]
     */
    private array $cartItems = [];
    public function __construct(
        protected CartStorageInterface $cartStorage,
        protected CartLimitService $cartLimitService,
    ) {
    }

    public function getCart():array
    {
        $this->loadItems();
        return $this->cartItems;
    }

    public function add(ProductDto $data):void
    {
        $this->loadItems();
        $res = $this->cartLimitService->checkCount($this->cartItems, $data);
        dd($res);
    }

    private function loadItems(): void
    {
        if (empty($this->cartItems)) {
            $this->cartItems = $this->cartStorage->load();
        }
    }


    private function saveItems($id): void
    {
        $this->cartStorage->saveItems($id);
    }
}
