<?php

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ranges = [
            [0, 0],
            [100, 150],
            [150, 300],
            [300, 500],
            [500, 1000],
            [1000, 5000]
        ];

        foreach (range(1, 100) as $i) {
            $type = mt_rand(1, 5);
            Room::create([
                'no' => 'No' . $i,
                'room_type_id' => $type,
                'price' => mt_rand(...$ranges[$type]),
                'discount' => mt_rand(0, 10)
            ]);
        }
    }
}
