<?php

declare(strict_types=1);

namespace app\Services\UserService;

class UserIdentificationService
{
    protected string $token;

    public function __construct(?string $token = null)
    {
        if ($token && !is_string($token)) {
            throw new \InvalidArgumentException('Token must be a string');
        }
        $this->token = $token;
    }

    public function getToken()
    {
    }
}
