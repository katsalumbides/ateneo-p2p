@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Announcements</h2></div>
 
                <div class="panel-body">
                    @foreach ($announcements as $announcement)
                       <h3> {{ $announcement->title }} </h3> <br>
                       <!-- need to add time and date here -->
                       {{ $announcement->content }} <br>
                       <hr>
                    @endforeach
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><h2>Schedules</h2></div>

                <div class="panel-body">

                    <h4>To Ateneo</h4>
                    @foreach($locations as $location)
                        @if ($location -> trip_type  == 0)

                            {{ $location -> name }}<br>
                            
                            @foreach ($location -> schedules as $schedule)
                                {{$schedule -> timeslot -> time_slot }} <br>
                            @endforeach
                            <br>

                        @endif
                    @endforeach

                    <hr>
                    
                    <h4>From Ateneo</h4>
                    @foreach($locations as $location)
                        @if ($location -> trip_type == 1)

                            {{ $location -> name }} <br>
                            
                            @foreach ($location -> schedules as $schedule)
                                {{$schedule -> timeslot -> time_slot }} <br>
                            @endforeach
                            <br>

                        @endif

                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
