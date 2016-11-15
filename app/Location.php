<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
	public $timestamps = false;

    public function slots(){
    	return $this->hasMany(Slots::class);
    }
}
