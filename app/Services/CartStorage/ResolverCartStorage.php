<?php

declare(strict_types=1);

namespace App\Services\CartStorage;

use App\Services\CartService\CartDtoService;
use App\Services\Service\CartLimitService;
use Illuminate\Http\Request;

readonly class ResolverCartStorage
{
    public function __construct(
        protected CartDtoService $cartDtoService,
    )
    {
    }

    public function resolve(Request $request): CartStorageInterface
    {
        $token = $request->header('X-Cart-Token');
        if (auth('sanctum')->check()) {
            return new RegisteredUserDbCartStorage($this->cartDtoService);
        }
            return new GuestDBStorage($token);
    }
}
