<?php

declare(strict_types=1);

namespace app\Services\CartStorage;

use App\Services\Service\UserService;

readonly class RegisteredUserDbCartStorage implements CartStorageInterface
{
    public function __construct(
        private string $token,
        protected UserService $userService

    ) {}

    public function getItems()
    {
        return "Hi, I'm RegisterUserDbCartStorage $this->token";
    }

    public function saveItems(): void
    {
        // TODO: Implement saveItems() method.
    }

    public function getUser()
    {

        return $this->userService->getUser();
    }
}
