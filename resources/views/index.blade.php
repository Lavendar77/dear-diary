@extends('layouts.home')

@section('title')
	Home
@endsection

@section('header')
	<div class="header text-center">
		<h1>Dear Diary</h1>
		<a href="{{ route('login') }}" class="btn btn-primary">Get Started</a>
	</div>
@endsection

@section('content')
	<div class="content">
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</div>
@endsection