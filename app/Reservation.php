<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
	public $timestamps = false;

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function slot(){
    	return $this->belongsTo(Slot::class);
    }
}
