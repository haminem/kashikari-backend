<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'test',
            'password' => 'test',
            'follow_code' => 'test',
        ]);
        User::factory()->create([
            'name' => 'test2',
            'password' => 'test2',
            'follow_code' => 'test2',
        ]);
        User::factory()->create([
            'name' => 'test3',
            'password' => 'test3',
            'follow_code' => 'test3',
        ]);
    }
}
