<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class User_log extends Model
{
    public function user()
    {
        return $this->belongsTo('App/User');
    }
}
