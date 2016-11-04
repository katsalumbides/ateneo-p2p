@extends('layout')

@section('content')
	

	<h1> Welcome, {{ $user -> first_name }} {{ $user->last_name }}</h1>

@stop