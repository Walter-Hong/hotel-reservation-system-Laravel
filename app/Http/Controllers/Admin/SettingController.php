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
            'company'       => 'hotel name',
            'welcome_title' => 'welcome slogon',
            'welcome_content' => 'welcome info',
            'service_title' => 'service title',
            'service_title' => 'service info',
        ]);

        Setting::first()->update($request->all());

        flashy()->success('success', '#');

        return back();
    }
}
