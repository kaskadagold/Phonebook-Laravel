<?php

namespace Database\Seeders;

use App\Models\Priority;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            [
                'name' => 'Высокий',
                'level' => 1,
            ],
            [
                'name' => 'Средний',
                'level' => 50,
            ],
            [
                'name' => 'Низкий',
                'level' => 100,
            ],
        ];

        foreach ($levels as $level) {
            $priorities[] = Priority::create($level);
        }
    }
}
