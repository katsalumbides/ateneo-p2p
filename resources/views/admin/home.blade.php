@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <h1>Admin</h1>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Announcements</h2>
                    <button type="submit" class="btn btn-primary" data-toggle="collapse" data-target="#add_announcement">Add Announcement</button>

                    <form class="form-horizontal" role="form" method="get" action="/admin/home/announcement">
                    {{ csrf_field() }}

                        <div class="collapse" id="add_announcement" >
                            <div class="form-group row">
                                <label for="announcement_title" class="col-md-4 control-label">Title</label>
                                <div class="col-md-6 radio">
                                     <input id="announcement_title" type="text" class="form-control" name="announcement_title" required>
                                </div>                                
                            </div>
                            <div class="form-group row">
                                <label for="announcement_content" class="col-md-4 control-label">Content</label>
                                <div class="col-md-6 radio">
                                    <textarea class="form-control" id="announcement_content" rows="3"  name="announcement_content"  required></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary"> Add </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
 
                <div class="panel-body">
                    @foreach ($announcements as $announcement)
                       <h3> {{ $announcement->title }} </h3> <br>
                       
                       {{ $announcement -> created_at}} <br>
                       {{ $announcement-> content }} <br>
                       
                       <!-- Delete Button -->
                        <form method="get" action="/admin/home/{{$announcement->id}}">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Delete</button>
                            </div>
                        </form>
                       <hr>
                    @endforeach
                </div>

            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Schedules</h2>
                    <form method="get" action="admin/home/{{$announcement->id}}">

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" >Edit Schedules</button>
                            </div>
                        </form>
                </div>

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
