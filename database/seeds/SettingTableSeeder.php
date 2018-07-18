<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'company' => '诸葛酒店',
            'welcome_title' => '诸葛酒店欢迎您',
            'welcome_content' => '度假观光，旅游休闲的最好选择',
            'service_title' => '最舒适的服务',
            'service_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit ullam, est, sint nisi repellat laudantium mollitia nam reiciendis animi minima id doloribus expedita. Veritatis earum, vel illum natus porro blanditiis.',
            'weibo' => 'rrylee',
            'facebook' => 'rrylee',
            'twitter' => 'rry_lee'
        ]);
    }
}
