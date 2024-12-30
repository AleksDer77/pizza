<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Services\Service\CartLimitService;
//use Factory\ProductDtoFactory;
use PHPUnit\Framework\TestCase;
use Tests\Factory\ProductDtoFactory;

class CartLimitServiceTest extends TestCase
{
    public function test_check_count_allows_adding_within_limit()
    {
        $cartLimit = [1 => 10, 2 => 5];
        $service = new CartLimitService($cartLimit);

        $cartItems = [
            (object) ['categoryId' => 1, 'quantity' => 4],
            (object) ['categoryId' => 2, 'quantity' => 2],
        ];

        $productDto = ProductDtoFactory::make(['categoryId' => 1, 'quantity' => 2]);
        $res = $service->checkCount($cartItems, $productDto);
        $this->assertTrue($res);
    }

    public function test_check_count_not_allows_adding_within_limit()
    {
        $cartLimit = [1 => 10, 2 => 5];
        $service = new CartLimitService($cartLimit);

        $cartItems = [
            (object) ['categoryId' => 1, 'quantity' => 4],
            (object) ['categoryId' => 2, 'quantity' => 4],
        ];
        $productDto = ProductDtoFactory::make(['categoryId' => 2, 'quantity' => 2]);
        $this->expectException(\LogicException::class);
        $service->checkCount($cartItems, $productDto);
//        $this->assertThro($res);

    }
}
