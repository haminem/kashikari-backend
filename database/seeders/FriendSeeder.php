<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Friend;

class FriendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Friend::factory()->create([
            'user_id' => 1,
            'friend_id' => 2,
        ]);
        Friend::factory()->create([
            'user_id' => 2,
            'friend_id' => 1,
        ]);
        Friend::factory()->create([
            'user_id' => 2,
            'friend_id' => 3,
        ]);
        Friend::factory()->create([
            'user_id' => 3,
            'friend_id' => 2,
        ]);
    }
}
