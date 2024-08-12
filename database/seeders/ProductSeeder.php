<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;

use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('id_ID');

        for ($i = 1; $i <= 50; $i++) {
            $data = [
                'name' => 'Samsung J' . $i . ' Prime',
                'price' => $faker->randomNumber(5, true),
            ];

            Product::create($data);
        }
    }
}
