<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Ahmed',
            'email' => 'ahmed@gmail.com',
            'password' => bcrypt('ahmed184825'),
            'role_id' => 1,
        ]);

        User::create([
            'name' => 'Mohamed',
            'email' => 'mohamed@outlook.com',
            'password' => bcrypt('Mohamed26197'),
            'role_id' => 2,
        ]);
    }
}
