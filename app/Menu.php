<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //


    public function meal(){
        $this->hasOne('App\Meal');
    }

    public function order(){
        $this->hasMany('App\Order');
    }
}
