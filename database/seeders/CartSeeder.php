<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('carts')->insert([
            [
                'user_id' => 1,
                'created_at' => now(),
            ],
            [
                'user_id' => 3,
                'created_at' => now(),
            ],
            [
                'user_id' => 4,
                'created_at' => now(),
            ],
        ]);
    }
}
