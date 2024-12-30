<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name'        => 'pizza',
                'limit'       => 10,
                'description' => 'pizza pizza',
                'image_url'   => fake()->url,
            ],
            [
                'name'        => 'drinks',
                'limit'       => 20,
                'description' => 'drinks pizza',
                'image_url'   => fake()->url,
            ],
        ]);
    }
}
