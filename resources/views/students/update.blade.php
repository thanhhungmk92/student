
@extends('layouts.master')
@section('header')
<h1 class="text-primary">Update student</h1>
@stop

@section('content')
  {!! Form::model($student,['url' => '/students/'.$student->id, 'method' => 'put']) !!}
    @include('partials.forms.student')
  {!! Form::close() !!}
  
@stop

