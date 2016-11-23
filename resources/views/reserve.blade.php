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
                                <label><input id="trip_type" type="radio" value="0" name="trip_type" required autofocus> To Ateneo (Morning) </label> <br>
                                <label><input id="trip_type" type="radio" value="1" name="trip_type" required autofocus> From Ateneo (Afternoon) </label> <br>
                            </div>
						</div>

						<div class="form-group row">
	                		<label for="location" class="col-md-4 control-label">Locations</label>
	                		<div class="col-md-6 radio">
		                		<select class="form-control" id="location">
		                			<option>Please choose a location</option>
							    </select>	
						    </div>
						</div>

						<div class="form-group row">
	                		<label for="schedule" class="col-md-4 control-label">Available Time Slots</label>
	                		<div class="col-md-6 radio">
		                		<select class="form-control" id="schedule">
		                			<option>1</option>
							      	<option>2</option>
							     	<option>3</option>
							      	<option>4</option>
							      	<option>5</option>
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
	  crossorigin="anonymous"></script>

<script type="text/javascript">
	function changeQuantity(){
		var trip_type = $('#trip_type').val();
		$.ajax({
			type: "POST",
			url: "/reserve",
			data: trip_type,
			cache: false,
			dataType: 'json',
			success: function(data){
				for ( i in $locations ){
					var option = $('<option></option>').attr("value", i).text(i); //<option value="i">i</option>
					$('#location').append(option);
				}
			}
		});
	}

	window.changeQuantity();
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