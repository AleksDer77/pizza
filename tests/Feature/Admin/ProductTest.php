<?php

declare(strict_types=1);

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use DatabaseTransactions;

    public function test_route_is_accessible_only_by_admin(): void
    {
        $this->withoutExceptionHandling();

        Sanctum::actingAs(User::factory([
            'is_admin' => true,
        ])->create());

        $response = $this->getJson(route('admin.products.index'));

        $response->assertStatus(200);
    }

    public function test_get_all_products(): void
    {
        $this->withoutExceptionHandling();
        $this->withoutMiddleware();

        $response = $this->getJson(route('admin.products.index'));

        $response->assertStatus(200)
            ->assertJsonCount(16, 'data')
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'description',
                        'price',
                        'image_url',
                        'available',
                        'featured',
                    ],
                ],
            ]);
    }
}
