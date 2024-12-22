<?php

declare(strict_types=1);

namespace App\Services\CartStorage;

use Illuminate\Support\Collection;

class GuestDBStorage implements CartStorageInterface
{
    public function __construct(public string $token)
    {
    }

    public function getItems()
    {
        return "Hi, I'm GuestDBStorage $this->token";
    }

    public function saveItems()
    {
        // TODO: Implement saveItems() method.
    }
}
