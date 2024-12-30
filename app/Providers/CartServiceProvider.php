<?php

declare(strict_types=1);

namespace App\Providers;

use App\Services\CartService\CartDtoService;
use app\Services\CartStorage\CartStorageInterface;
use App\Services\CartStorage\ResolverCartStorage;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(CartDtoService::class, function () {
            return new CartDtoService();
        });
        $this->app->bind(CartStorageInterface::class, function ($app) {
            $request = $app->make(Request::class);
            $app->make(CartDtoService::class);
            return $app->make(ResolverCartStorage::class)->resolve($request);
        });
    }

    public function boot(): void
    {
    }
}
