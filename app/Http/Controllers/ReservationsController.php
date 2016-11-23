<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
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

    public function selectTripType()
    {
        $locations =  Location::where('trip_type', $request->trip_type)->first();

        return Response::json($locations);
    }
}
