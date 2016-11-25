@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <h1>Reservation</h1>
            <div class="panel panel-default">
                <div class="panel-body">
                	<form class="form-horizontal" role="form" method="POST" action="/reserve">
                	{{ csrf_field() }}
	                	
	                	<div class="form-group row">
	                		<label for="date_slots" class="col-md-4 control-label">Date</label>
	                		<div class="col-md-6">
						    	<input id="date_slots" type="date" class="form-control" name="date_slots" required autofocus>
						  	</div>
						</div>

						<div class="form-group row">
	                		<label for="trip_type" class="col-md-4 control-label">Trip Type</label>
	                		<div class="col-md-6 radio">
                                <label><input id="trip_type" onchange="changeTripType()" type="radio" value="0" name="trip_type" required autofocus > To Ateneo (Morning) </label> <br>
                                <label><input id="trip_type" onchange="changeTripType()" type="radio" value="1" name="trip_type" required autofocus > From Ateneo (Afternoon) </label> 
                                <br>
                            </div>
						</div>

						<div class="form-group row">
	                		<label for="location" class="col-md-4 control-label">Locations</label>
	                		<div class="col-md-6 radio">
		                		<select class="form-control" id="location" onchange="changeLocation()"">
							    </select>	
						    </div>
						</div>

						<div class="form-group row">
	                		<label for="timeslot" class="col-md-4 control-label">Available Time Slots</label>
	                		<div class="col-md-6 radio">
		                		<select class="form-control" id="timeslot">
							    </select>	
						    </div>
						</div>

						<div class="form-group row">
	                		<label for="comment" class="col-md-4 control-label">Special Comments</label>
	                		<div class="col-md-6 radio">
                                <textarea class="form-control" id="comment" rows="3"></textarea>
                            </div>
						</div>

						<div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>

<script
	src="https://code.jquery.com/jquery-3.1.1.min.js"
	integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
	crossorigin="anonymous">
</script>

<script type="text/javascript">
	function changeTripType(){
		var trip_type = $('#trip_type:checked').val();
		$.ajax({
			type: "get",
			url: "/reserve/trip_type/" + trip_type,
			data: trip_type,
			cache: false,
			success: function(data){
				$("input[id=location]").attr('disabled', false);
				$('#location').empty()
				for ( var i in data.locations ){
					var location_name = (data.locations)[i].name;
					var locationID = (data.locations)[i].id;
					console.log(locationID);
					var option = $('<option></option>').attr("value", locationID).text(location_name); //<option value="i">i</>
					// .attr("onchange","changeLocation()")
					$('#location').append(option);
				}
			},
		});
	}

	function changeLocation(){
		var location = $('#location option:selected').val();
		console.log(location);
		$.ajax({
			type: "get",
			url: "/reserve/location/" + location,
			data: location,
			cache: false,
			success: function(data){
				console.log("success")
				$("input[id=timeslot]").attr('disabled', false);
				$('#timeslot').empty()
				for ( var i in data.timeslots ){
					console.log("loops")
					var time = (data.timeslots)[i].time_slot;
					var timeslotID = (data.timeslots)[i].id;
					var option = $('<option></option>').attr("value", timeslotID).text(time); //<option value="i">i</>
					$('#timeslot').append(option);
				}
			}

		});


	}
</script>

@endsection

<!-- 
	learn how to render info depending on choices
	.form-check
	https://v4-alpha.getbootstrap.com/components/forms/
	http://laravel.io/forum/06-21-2016-how-to-refresh-a-page-without-refreshing-master-page
	https://scotch.io/tutorials/submitting-ajax-forms-with-jquery
	https://laracasts.com/discuss/channels/tips/crud-laravel-without-refresh-page
	https://laracast.blogspot.com/2016/06/laravel-ajax-crud-search-sort-and.html
 -->
