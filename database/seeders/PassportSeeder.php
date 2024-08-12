<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Faker\Factory;

class PassportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Artisan::call('passport:client', [
            '--personal' => true,
            '--no-interaction' => true,
            '--name' => 'Passport Client',
            '--password' => true
        ]);
    }
}
