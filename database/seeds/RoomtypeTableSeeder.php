<?php

use App\Models\RoomType;
use Illuminate\Database\Seeder;

class RoomtypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            '单人间',
            '标间',
            '双人间',
            '豪华单间',
            '总统套房'
        ];

        foreach ($types as $type) {
            RoomType::create([
                'name' => $type
            ]);
        }
    }
}
