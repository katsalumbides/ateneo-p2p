<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use App\Location;
use App\Schedule;
use App\Timeslot;
use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Requests;

class ReservationsController extends Controller
{
    public function show()
    {
    	$user = Auth::user();

    	return view('profile', compact('user'));
    }

    public function delete(Reservation $reservation)
    {
    	$reservation->delete();

    	return back();
    }

    public function reserve()
    {
        return view('reserve');
    }

    public function selectTripType($trip_type)
    {
        $locations =  Location::where('trip_type', request()->trip_type)->get();

        return response()->json(['locations' => $locations]);
    }

    public function selectLocation($location)
    {
        $timeslots = DB::table('schedules')
            ->where('location_id', request()->location)
            ->join('timeslots', 'timeslots.id', '=', 'schedules.timeslot_id')
            ->select('schedules.*','timeslots.id','timeslots.time_slot')
            ->get();

        return response()->json(['timeslots' => $timeslots]);
    }
}
