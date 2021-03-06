@extends('layouts.app')
@section('content')
	<div class="container">
		@if(Session::has('success'))
					<div class="alert alert-success">{{Session::get('success')}}</div>
				@elseif(Session::has('warning'))
					<div class="alert alert-danger">{{Session::get('warning')}}</div>
				@endif
		<div class="panel panel-primary">

			<div class="panel-heading"><h1>Calendar</h1></div>
				
				<div class="panel-body" style="font-size:15px;">
					<form class="form-inline" role="form" method="post" action="{{url('events/add')}}">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
					    <label for="email2" class="mb-2 mr-sm-2">Name:</label>
					    <input type="text" class="form-control mb-2 mr-sm-2" id="email2" placeholder="Name event" name="name" style="font-size:13px;">

					    <label for="pwd2" class="mb-2 mr-sm-2">Start Date:</label>
					    <input type="date" class="form-control mb-2 mr-sm-2" id="pwd2" placeholder="Start date" name="start_date" style="font-size:13px;">

					     <label for="pwd2" class="mb-2 mr-sm-2">End Date:</label>
					    <input type="date" class="form-control mb-2 mr-sm-2" id="pwd2" placeholder="End date" name="end_date" style="font-size:13px;">
					      
					  <button type="submit" class="btn btn-primary mb-2" style="font-size:13px;">Submit</button>
				  </form>
				</div>
		</div>
		<div class="panel panel-primary">
			<div class="panel-heading"><h1>Event Calendar</h1></div>
			<div class="panel-body">
				{!! $calendar_details->calendar() !!}
			</div>
		
		</div>
	</div>
@endsection