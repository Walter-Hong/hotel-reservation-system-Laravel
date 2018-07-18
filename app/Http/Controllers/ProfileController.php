<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Validator;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function update(Request $request)
    {
        $rules = [
            'name' => 'required',
        ];

        if ($request->get('old_password') != '' ||
            $request->get('password') != '' ||
            $request->get('password_confirmation') != '') {
            $rules = array_merge($rules, [
                'old_password' => 'required|current_password',
                'password' => 'required|confirmed',
            ]);
        }

        $this->validate($request, $rules, [], [
            'name' => '用户名',
            'password' => '密码|min:6',
            'old_password' => '当前密码'
        ]);

        $user = Auth::user();
        $user->name = $request->get('name');
        if (count($rules) == 1) {
            $user->save();
            flashy()->success('修改成功');
            return back();
        } else {
            $user->password = Hash::make($request->get('password'));
            $user->save();
            Auth::logout();
            flashy()->success('修改成功, 请重新登录');
            return redirect('/login');
        }
    }
}
