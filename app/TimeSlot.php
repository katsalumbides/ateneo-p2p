<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
    public function slots(){
    	return $this->hasMany(Slots::class);
    }
}
