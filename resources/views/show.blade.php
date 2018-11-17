@extends('layouts.master')
@section('header')
	<h1>Show details student</h1>
@stop
@section('content')
	<h3>Name:{{$student->name}}</h3>
	<h3>Class:{{$student->school->name}}</h3>
	<h3>Date of birth:{{$student->date_of_birth}}</h3>
	<h3>Address:{{$student->address}}</h3>
	<h3>Last modify {{$student->updated_at}}</h3>
	<a href="{{url('/students')}}" class="btn btn-primary btn-lg">Back to home page</a>
@stop