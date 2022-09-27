<?php

namespace Database\Seeders;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Vacuum \' cleaner',
                'category' => 'Cleaning',
                'price' => rand(1, 15),
                'created_at' =>  Carbon::now()
            ],
            [
                'name' => 'Microfiber\' cloths',
                'category' => 'Cleaning',
                'price' => rand(1, 15),
                'created_at' =>  Carbon::now()
            ],
            [
                'name' => 'Broom and\' dustpan',
                'category' => 'Cleaning',
                'price' => rand(1, 15),
                'created_at' =>  Carbon::now()
            ],
            [
                'name' => 'Nestlé',
                'category' => 'Food',
                'price' => rand(1, 15),
                'created_at' =>  Carbon::now()
            ]
        ];

        foreach ($products as $key => $product) {
            Product::create($product);
        }
    }
}
