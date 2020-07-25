<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user(){
        $this->hasOne('App\User');
    }

    public function menu(){
        $this->hasOne('App\Menu');
    }
}
