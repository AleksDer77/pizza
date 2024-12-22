<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class TestController extends Controller
{
    public function __invoke()
    {
        return response()->json([
            'message' => 'Welcome to TestController',
        ]);
    }
};
