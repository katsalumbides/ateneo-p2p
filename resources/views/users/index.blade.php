@extends('layout')

@section('content')

	<h1>List of All Users</h1>

	<ul class="list-group">
		@foreach ($users as $user)
			<li class="list-group-item"> <a href="/users/{{$user->id}}"> {{ $user->last_name }}  </a></li>
		@endforeach
	</ul>

@stop

