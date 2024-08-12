<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;

use App\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('id_ID');

        $data = [
            'name' => 'Elektronik',
            'description' => 'Kategori elektronik',
        ];

        ProductCategory::create($data);

        $data = [
            'name' => 'Mebel',
            'description' => 'Kategori mebel',
        ];

        ProductCategory::create($data);
    }
}
