<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{

    protected $guarded =[];


    public function menu(){
        return $this->hasMany(Menu::class);
    }



}
