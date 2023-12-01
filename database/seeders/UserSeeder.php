<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $merchant = User::create([
            'name' => 'merchant',
            'email' => 'merchant@gmail.com',
            'password' => '12345678',
            'type' => 'merchant'
        ]);

        $merchant->assignRole('merchant');

        $user = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => '12345678',
            'type' => 'user'
        ]);

        $user->assignRole('user');
    }
}
