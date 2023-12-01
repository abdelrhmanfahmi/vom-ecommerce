<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name_ar' => 'المنتج الاول',
            'name_en' => 'product one',
            'description_ar' => 'الوصف الاول',
            'description_en' => 'description one',
            'price' => 100,
            'store_id' => 1,
            'has_vat' => '1'
        ]);

        Product::create([
            'name_ar' => 'المنتج الثاني',
            'name_en' => 'product two',
            'description_ar' => 'الوصف الثاني',
            'description_en' => 'description two',
            'price' => 200,
            'store_id' => 2,
            'has_vat' => '1'
        ]);
    }
}
