@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1> Welcome, {{ $user -> first_name }} {{ $user->last_name }}!</h1>

                @if ($user -> user_type == 0)
                    <h4> Ateneo High School Student </h4>
                @elseif ($user -> user_type == 1)
                    <h4> Loyola Schools Student </h4>
                @elseif ($user -> user_type == 2)
                    <h4> Ateneo Employee </h4>
                @endif

                <!-- Lists all the reservations of a user -->
                <ul class ="list-group">
                @foreach ($user->reservations as $reservation)
                    <li class="list-group-item">
                        <?php $schedule = $reservation->slot->schedule ?>

                        {{$schedule->location->name}}<br>
                        {{$schedule->timeslot->time_slot}}
                        @if ($schedule->location->trip_type == 0)
                            AM
                        @else
                            PM
                        @endif

                        <!-- Delete Button -->
                        <form method="get" action="profile/{{$reservation->id}}">
                            <!-- {{ method_field('DELETE') }} -->

                            <div class="form-group">
                                <!-- <textarea class="form-control" name="delete"></textarea> -->
                                <button type="submit" class="btn btn-primary">Delete</button>
                            </div>
                        </form>
                    </li>       
                @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection