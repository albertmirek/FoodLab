<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $guarded =[];

    public function meal(){
        return $this->hasOne('App\Meal');
    }

    public function order(){
        return $this->hasMany('App\Order');
    }
}
