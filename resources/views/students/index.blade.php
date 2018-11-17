@extends('layouts.master')
@section('header')
	<h1>List student @if(isset($school)) class {{$school->name}} @endif</h1>
	<a href="{{url('students/create')}}" class="btn btn-primary"> Create student of class </a>
	<a href="{{url('students/export')}}" class="btn btn-danger"> Export Excel Student </a>
	<a href="{{url('students/fulltextsearch')}}" class="btn btn-danger"> Search full </a>
	<br><br>
	@if(!isset($school))
	<select class="form-control" id="filterText" onchange='filterText()'>
		<option value=""></option>
		@foreach ($students as $student)
		<option value="{{$student->school->name}}">{{$student->school->name}}</option>
		@endforeach
	</select>
	@endif
	<br>
	<br>

	

	<!--<a href="{{url('cats/create')}}" class="btn btn-primary pull-right"> Create new cat </a>-->

@stop
@section('content')
	
	<table class="table table-bordered table-hover">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>DateOfBirth</th>
			<th>Address</th>
			<th>Class</th>
			<th>Update</th>
			<th>Delete</th>
			<th>Excel</th>
			<th>Export PDF</th>
		</tr>


		@foreach ($students as $student)
		<tr class="content">
			<td> {{ $student->id}}</td>
			<td><a href="{{url('students/'.$student->id)}}"> {{ $student->name}}</a></td>
			<td> {{$student->date_of_birth}}</td>
			<td> {{$student->address}}</td>
			<td><a href="{{url('students/schools/'.$student->school->name)}}">{{$student->school->name}}</a></td>
			<td><a href="{{url('students/'.$student->id.'/update')}}" class="btn btn-outline-primary"> Update </a> </td>
			<td><button class="btn btn-outline-danger" data-catid="{{$student->id}}" data-toggle="modal" data-target="#delete">Delete</button></td>
			<td><a href="{{url('students/export/'.$student->id)}}" class="btn btn-outline-primary">Excel</a></td>
			<td><a href="{{url('students/pdf/'.$student->id)}}" class="btn btn-outline-primary">PDF</a></td>
		</tr>
		 @endforeach
		 <!-- Xử lý thông báo DELETE-->
		 <div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
			      </div>
			      <form action="{{url('students/'.$student->id.'/delete')}}" method="get">
			      		{{method_field('delete')}}
			      		{{csrf_field()}}
				      <div class="modal-body">
							<p class="text-center">
								Are you sure you want to delete student?
							</p>
				      		<input type="hidden" name="student_id" id="student_id" value="{{$student->id}}">
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-primary" data-dismiss="modal">No, Cancel</button>
				        <button type="submit" class="btn btn-danger">Yes, Delete</button>
				      </div>
			      </form>
			    </div>
			  </div>
		</div>
	</table>

	<div>
		<form class="form-control"  enctype="multipart/form-data" id="createForm">
			<label>Tên </label> <input type="text" name="name" id="name">
			<label> Image</label> <input type="file" name="file" id="file">
			<br>
			<button type="submit" class="btnSubmit">Kichs</button>
		</form>
	</div>

	@stop
