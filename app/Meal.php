<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{

    protected $guarded =[];

    public function user(){
        $this->belongsTo('App\User');
    }



}
