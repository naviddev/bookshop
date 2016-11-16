<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function admin()
    {
        return $this->belongsTo('App\Admin');
}

    public function book()
    {
        return $this->hasOne('App\model\book');
}
}
