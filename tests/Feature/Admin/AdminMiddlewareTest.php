<?php

declare(strict_types=1);

namespace Tests\Feature\Admin;

use Tests\TestCase;

class AdminMiddlewareTest extends TestCase
{
    public function testBasic()
    {
        $this->withoutExceptionHandling();


//        $route = route('admin.products.index');



        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
