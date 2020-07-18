<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{

    public function user(){
        $this->belongsTo('App\User');
    }

    public function option(){
        $this->belongsTo()
    }

}
