<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    public $timestamps = false;

    public function reservations(){
    	return $this->hasMany(Reservation::class);
    }

    public function schedule(){
        return $this->belongsTo(Schedule::class);
    }

}
