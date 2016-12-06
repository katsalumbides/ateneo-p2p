<?php

namespace App\Http\Controllers;

use App\Slot;
use App\Schedule;
use Illuminate\Http\Request;

use App\Http\Requests;

class ScheduleController extends Controller
{
    public function view(){

    	
    	$schedules = Schedule::all();

    	return view('admin.schedules', compact('schedules'));
    }

    public function add(){

    	$selected_dates = request()->date_slots;
    	$dates = explode(",", $selected_dates);

    	$schedules = request()->schedules;

    	foreach ($dates as $date){
    		foreach ($schedules as $schedule){

    			$slot = array(
		            'schedule_id' => $schedule, 
		            'date_slots' => $date, 		//just need to fix layout of the date!
		            'num_of_seats' => 10,
		        );

        		Slot::create($slot);
    		}
    	}

    	return back();
    }
}
