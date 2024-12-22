<?php

declare(strict_types=1);

namespace app\Services\CartStorage;

use Illuminate\Support\Collection;

interface CartStorageInterface
{
    public function getItems();

    public function saveItems();
}
