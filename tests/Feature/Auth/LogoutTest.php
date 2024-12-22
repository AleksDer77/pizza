<?php

declare(strict_types=1);

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    use DatabaseTransactions;
    public function test_user_can_logout(): void
    {
        $this->withExceptionHandling();

        Sanctum::actingAs(User::first());

        $response = $this->postJson('/api/logout');
        $response->assertStatus(204);

    }
}
