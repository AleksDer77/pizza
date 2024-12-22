<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Exceptions\ResourceNotFoundException;
use App\Models\Product;
use app\Services\CartService\CartService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TestCreateCommand extends Command
{
    protected $signature = 'test:command';

    protected $description = 'Command description';

    /**
     * @throws ResourceNotFoundException
     */
    public function handle(): void
    {
        $currency = \Number::currency(100, 'RU');
        dd($currency);
    }

}
