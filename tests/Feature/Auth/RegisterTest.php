<?php

declare(strict_types=1);

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use DatabaseTransactions;

    public function test_can_user_register(): void
    {
        $this->withExceptionHandling();
        $user = [
            'name'                  => 'John Doe',
            'email'                 => 'john@doe.com',
            'password'              => 'password',
            'password_confirmation' => 'password',
        ];
        $response = $this->postJson(route('register'), $user);

        $response->assertStatus(201)
            ->assertJson(fn(AssertableJson $json) => $json->has('message')
            );
        $storedUser = User::query()->where('email', $user['email'])->first();

        $this->assertEquals($storedUser->name, $user['name']);
        $this->assertEquals($storedUser->email, $user['email']);
        $this->assertFalse($storedUser->is_admin);
    }

    public function test_return_exception_is_attr_invalid(): void
    {
        $user = [
            'name'                  => '',
            'email'                 => 'john@doe.com',
            'password'              => 'password',
        ];
        $response = $this->postJson(route('register'), $user);

        $response->assertStatus(422)
        ->assertJsonValidationErrors('name' );
    }
}
