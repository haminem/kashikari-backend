<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::factory()->create([
            'friend_id' => 1,
            'title' => 'test',
            'description' => 'test',
            'point' => 100,
            'deadline' => '2021-01-01',
            'status' => 'suggest',
            'sale' => false,
        ]);
        Task::factory()->create([
            'friend_id' => 1,
            'title' => 'test_shop',
            'description' => 'test_shop',
            'point' => 100,
            'deadline' => '2021-01-01',
            'status' => 'suggest',
            'sale' => true,
        ]);
        Task::factory()->create([
            'friend_id' => 1,
            'title' => 'test2',
            'description' => 'test2',
            'point' => 200,
            'deadline' => '2021-01-02',
            'status' => 'progress',
            'sale' => false,
        ]);
        Task::factory()->create([
            'friend_id' => 1,
            'title' => 'test3',
            'description' => 'test3',
            'point' => 300,
            'deadline' => '2021-01-03',
            'status' => 'done',
            'sale' => false,
        ]);
        Task::factory()->create([
            'friend_id' => 3,
            'title' => 'test4',
            'description' => 'test4',
            'point' => 400,
            'deadline' => '2021-01-04',
            'status' => 'suggest',
            'sale' => false,
        ]);
        Task::factory()->create([
            'friend_id' => 3,
            'title' => 'test_shop',
            'description' => 'test_shop',
            'point' => 400,
            'deadline' => '2021-01-04',
            'status' => 'suggest',
            'sale' => true,
        ]);
        Task::factory()->create([
            'friend_id' => 3,
            'title' => 'test5',
            'description' => 'test5',
            'point' => 500,
            'deadline' => '2021-01-05',
            'status' => 'progress',
            'sale' => false,
        ]);
        Task::factory()->create([
            'friend_id' => 3,
            'title' => 'test6',
            'description' => 'test6',
            'point' => 600,
            'deadline' => '2021-01-06',
            'status' => 'done',
            'sale' => false,
        ]);
    }
}
