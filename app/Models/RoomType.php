<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $fillable = [
        'name'
    ];

    public function rooms()
    {
        return $this->hasMany('App\Models\Room');
    }
}
