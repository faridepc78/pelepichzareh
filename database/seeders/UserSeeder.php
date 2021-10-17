<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        if (!User::query()->count()) {
            User::query()->firstOrCreate([
                'f_name' => 'فرید',
                'l_name' => 'شیشه بری',
                'email' => 'farid@gmail.com',
                'mobile' => '09123456789',
                'password' => bcrypt('09123456789'),
                'image_id' => null
            ]);
        }
    }
}
