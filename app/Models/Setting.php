<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'company', 'welcome_title', 'welcome_content',
        'service_title', 'service_content',
        'weibo', 'facebook', 'twitter'
    ];

    public static $rules = [
        'company'         => 'required',
        'welcome_title'   => 'required',
        'welcome_content' => 'required',
        'service_title'   => 'required',
        'service_content' => 'required'
    ];
}
