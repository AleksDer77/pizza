<?php

namespace App\Providers;

use App\Console\Commands\TestCreateCommand;
use App\Models\Category;
use App\Services\Service\CartLimitService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(CartLimitService::class, function () {
            return new CartLimitService(Category::getLimit());
        });
    }

    public function boot(): void
    {
        if ($this->app->environment() !== 'production') {

        DB::listen(static function ($query) {
            \Log::info($query->sql, $query->bindings);
        });
        }
    }
}
