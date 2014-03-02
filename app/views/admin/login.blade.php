@extends('admin.layouts.master')

@section('content')
	<form method="POST">
		<input type="text" name="username" placeholder="Username">
		<input type="password" name="password" placeholder="Password">
		<button type="submit">Login</button>
	</form>
@stop