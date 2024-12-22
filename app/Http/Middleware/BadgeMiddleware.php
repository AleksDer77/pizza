<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BadgeMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $data = $response->getData(true);
        $data['badge_count'] = 5;
        $response->setData($data);
        return $response;
    }
}
