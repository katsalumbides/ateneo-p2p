@extends('layout')

@section('content')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">

			<h1>List of All Users</h1>

			<ul class="list-group">
				@foreach ($users as $user)
					<li class="list-group-item"> <a href="/users/{{$user->id}}"> {{ $user->last_name }}  </a></li>
				@endforeach
			</ul>

		</div>
	</div>

@stop

