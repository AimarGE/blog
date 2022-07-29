<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    
    public function run()
    {
        User::create([
            'name' => 'Aimar',
            'email' => 'aimar@gmail.com',
            'password' => bcrypt('123456')
        ])->assignRole('Admin');
    }
}
