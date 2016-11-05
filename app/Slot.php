<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    public function reservations(){
    	return $this->hasMany(Reservation::class);
    }

    public function timeslot(){
    	return $this->belongsTo(TimeSlot::class);
    }

    public function location(){
    	return $this->belongsTo(Location::class);
    }

}
