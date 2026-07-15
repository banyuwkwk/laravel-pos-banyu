<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all();

        if ($categories->isEmpty()) {
            return;
        }

        $products = [

            [
                'category' => 'Food',
                'name' => 'Nasi Goreng',
                'price' => 25000,
                'stock' => 50,
            ],

            [
                'category' => 'Food',
                'name' => 'Mie Ayam',
                'price' => 18000,
                'stock' => 30,
            ],

            [
                'category' => 'Drink',
                'name' => 'Es Teh',
                'price' => 5000,
                'stock' => 100,
            ],

            [
                'category' => 'Drink',
                'name' => 'Kopi Hitam',
                'price' => 12000,
                'stock' => 40,
            ],

            [
                'category' => 'Snack',
                'name' => 'Keripik Kentang',
                'price' => 15000,
                'stock' => 25,
            ],

        ];

        foreach ($products as $item) {

            $category = Category::where('name', $item['category'])->first();

            if (!$category) {
                continue;
            }

            Product::create([

                'category_id' => $category->id,

                'name' => $item['name'],

                'slug' => Str::slug($item['name']),

                'sku' => 'SKU-' . strtoupper(Str::random(6)),

                'price' => $item['price'],

                'stock' => $item['stock'],

                'description' => $item['name'] . ' Description',

                'image' => null,

                'is_active' => true,

            ]);
        }
    }
}