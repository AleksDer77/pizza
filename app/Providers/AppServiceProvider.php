<?php

namespace App\Providers;

use App\Console\Commands\TestCreateCommand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.

     */
    public function boot(): void
    {
        if ($this->app->environment() !== 'production') {

        DB::listen(static function ($query) {
            \Log::info($query->sql, $query->bindings);
        });
        }
    }
}
