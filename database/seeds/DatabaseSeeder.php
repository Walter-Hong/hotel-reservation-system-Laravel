<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(SettingTableSeeder::class);
        $this->call(RoomtypeTableSeeder::class);
        $this->call(RoomTableSeeder::class);
    }
}
