<?php

declare(strict_types=1);

namespace App\Providers;

use app\Services\CartStorage\CartStorageInterface;
use App\Services\CartStorage\GuestDBStorage;
use app\Services\CartStorage\RegisteredUserDbCartStorage;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class CartStorageServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
    }
}
