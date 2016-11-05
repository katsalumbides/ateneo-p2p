@extends('layout')

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h1> Welcome, {{ $user -> first_name }} {{ $user->last_name }}</h1>

			<ul class ="list=group">
			@foreach ($user->reservations as $reservation)

				<li class="list-group-item"> 
				{{$reservation -> comment}} <br>
				{{$reservation -> slot -> location -> name}}

				<!-- <form method="DELETE"> -->
				<form>
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

@stop