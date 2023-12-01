<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'key' => 'vat',
            'value' => '50'
        ]);

        Setting::create([
            'key' => 'shipping_cost',
            'value' => '100'
        ]);
    }
}
