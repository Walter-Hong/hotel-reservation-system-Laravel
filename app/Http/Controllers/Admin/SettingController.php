<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.setting.index');
    }

    public function update(Request $request)
    {
        $this->validate($request, Setting::$rules, [], [
            'company'       => '酒店名称',
            'welcome_title' => '图片欢迎语标题',
            'welcome_content' => '图片欢迎语内容',
            'service_title' => '服务标题',
            'service_title' => '服务内容',
        ]);

        Setting::first()->update($request->all());

        flashy()->success('更新成功', '#');

        return back();
    }
}
