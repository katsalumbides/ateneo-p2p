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
						    	<input id="date_slots" class="form-control date hint" name="date_slots" value="You can select multiple dates." required autofocus>
						  	</div>
						</div>

						<div class="form-group row">
                            <label for="morning_schedule" class="col-md-4 control-label">Morning Schedules</label>
                            <div class="col-md-6 radio">
                                <select class="form-control" id="morning_schedule">
                                </select>   
                            </div>
                        </div>

						<div class="form-group row">
	                		<label for="afternoon_schedule" class="col-md-4 control-label">Afternoon Schedules</label>
	                		<div class="col-md-6 radio">
		                		<select class="form-control" id="afternoon_schedule">
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
<script src="/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

<script type="text/javascript">

	$('#date_slots').datepicker({
	   	multidate: true,
    	daysOfWeekDisabled: "0,6",
    	startDate:"0",
    	endDate: "+7d",
    	clearBtn: "true"
	});

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
					$('#location').append(option);
				}
			},
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

<!-- 
	implement calendar that can choose multiple dates 	http://multidatespickr.sourceforge.net/
	get all slots from that day
	display available morning slots in radio
	display available afternoon slots in radio
	reserve
 -->