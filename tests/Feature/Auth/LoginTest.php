<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use DatabaseTransactions;
    public function test_can_user_login(): void
    {
        $this->withoutExceptionHandling();
        $user = [
            'email'    => 'aleks@email.com',
            'password' => 'password',
        ];
        $response = $this->postJson(route('login'), $user);

        $response->assertStatus(200);
    }

    public function test_login_validates_email_and_password(): void
    {
        $response = $this->postJson(route('login'), [
            'email'    => 'invalid-email',
            'password' => '',
        ]);
        $response->assertStatus(422)
        ->assertJsonValidationErrors(['email', 'password']);
    }
}
