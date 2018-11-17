
@extends('layouts.master')
@section('header')
<h1 class="text-primary">Create new student</h1>
@stop

@section('content')
  {!! Form::open(['url' => '/students', 'method' => 'post']) !!}
    @include('partials.forms.student')
  {!! Form::close() !!}
  
@stop