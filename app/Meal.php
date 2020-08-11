<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{

    protected $guarded =[];

//    public function user(){
//        $this->belongsTo('App\User');
//    }
    public function menu(){
        return $this->belongsToMany('App\Menu');
    }



}
