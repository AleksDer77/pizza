<?php

declare(strict_types=1);

namespace App\Providers;

use app\Services\CartStorage\CartStorageInterface;
use App\Services\CartStorage\GuestDBStorage;
use app\Services\CartStorage\RegisteredUserDbCartStorage;
use App\Services\CartStorage\ResolverCartStorage;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    public function register(): void
    {
//        $this->app->bind(CartStorageInterface::class, function ($app, Request $request) {
//            if ($app->request->header('Authorization')) {
//                return new RegisteredUserDbCartStorage($request->header('Authorization'));
//            }
//            if ($app->runningInConsole()) {
//                return new RegisteredUserDbCartStorage('hi, хули');
//            }
//            if ($app) {}
//            return new GuestDBStorage('hui');
//        });
        $this->app->bind(CartStorageInterface::class, function ($app) {
            $request = $app->make(Request::class);
            $resolver = $app->make(ResolverCartStorage::class);
            return $resolver($request);
        });
    }

    public function boot(): void
    {
    }
}
