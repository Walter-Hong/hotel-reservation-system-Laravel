<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('121212'),
            'is_admin' => 1
        ];

        User::create($admin);

        $user = [
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('121212'),
        ];

        User::create($user);

        factory('App\Models\User', 100)->create();
    }
}
