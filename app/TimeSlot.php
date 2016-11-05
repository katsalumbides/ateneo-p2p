<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    public function slots(){
    	return $this->hasMany(Slots::class);
    }
}
