@extends('layout')

@section('content')

	<h1>List of All Users</h1>

	<ul>
		@foreach ($users as $user)

			<!-- <li> {{ $user->last_name }}  </li> -->
			<li> <a href="/users/{{$user->id}}"> {{ $user->last_name }}  </a></li>
		@endforeach
	</ul>

@stop

