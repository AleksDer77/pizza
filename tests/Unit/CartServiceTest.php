<?php

namespace Unit;

use app\Services\CartService\CartService;
use PHPUnit\Framework\TestCase;

class CartServiceTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_that_create_new_cart_service(): void
    {
        $cart = new CartService('hei, hei');
        $this->assertTrue('hei, hei', $cart->token);
    }
}
