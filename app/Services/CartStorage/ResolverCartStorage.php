<?php

declare(strict_types=1);

namespace App\Services\CartStorage;

use App\Services\Service\UserService;
use Illuminate\Http\Request;

class ResolverCartStorage
{

    public function __invoke(Request $request)
    {
        if ($request->headers->has('Authorization')) {
            return new RegisteredUserDbCartStorage($request->header('Authorization'), new UserService());
        }
            return new GuestDBStorage($request->header('X-Cart-Token'));
    }
}
