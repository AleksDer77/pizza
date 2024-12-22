<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'created_at' => fake()->dateTimeBetween('-4 months', now()),
                'name'       => 'Aleks',
                'email'      => 'aleks@email.com',
                'password'   => Hash::make('password'),
                'phone_number'      => '+7953337392',
                'is_admin'   => false,
            ],
            [
                'created_at' => fake()->dateTimeBetween('-4 months', now()),
                'name'       => 'Roma',
                'email'      => 'roma@email.com',
                'password'   => Hash::make('password'),
                'phone_number'      => '+7973380498',
                'is_admin'   => false,
            ],
            [
                'created_at' => fake()->dateTimeBetween('-4 months', now()),
                'name'       => 'Vladimir',
                'email'      => 'vladimir@email.com',
                'password'   => Hash::make('password'),
                'phone_number'      => '+7952839384',
                'is_admin'   => false,
            ],
            [
                'created_at' => fake()->dateTimeBetween('-4 months', now()),
                'name'       => 'Olya',
                'email'      => 'olya@email.com',
                'password'   => Hash::make('password'),
                'phone_number'      => '+797839437',
                'is_admin'   => false,
            ],
            [
                'created_at' => fake()->dateTimeBetween('-4 months', now()),
                'name'       => 'Drozd',
                'email'      => 'drozd@email.com',
                'password'   => Hash::make('password'),
                'phone_number'      => '+7953984827',
                'is_admin'   => true,
            ],
        ]);
    }
}
