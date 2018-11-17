<!DOCTYPE html>
<html>
<head>
	<title>Students</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<meta charset="utf8">
	<style>
		body {
			margin:0 auto;
		}
		table {
			border-collapse: collapse;
		}
		th,td {
			border: 1px solid black;
			text-align:center;
		}
		.container {
			width: 600px;
		}
		.container .col-sm-12 {
			width: 600px;
			height: 100px;
		}
		.container .col-sm-12 .col-sm-4{
			width: 200px;
			float:left;
		}
		.container .col-sm-12 .col-sm-8{
			width: 400px;
			float:left;
		}
		.container .table {
			margin:0 auto;
		}
		.container .title{
			margin:0 auto;
			text-align:center;
			font-size:18px;
			text-transform: uppercase;

		}

	</style>
</head>
<body>
<div class="container">
	<div class="col-sm-12">
		<div class="col-sm-4"><img src="source/anh.jpg" width="100px"></div>
		<div class="col-sm-8">
			<p>Student Table</p>
			<p>100 Nguyen Dinh Chieu</p>
			<p>0935444294</p>
		</div>
	</div>
	<div class="title">Chi Tiet Hoc Sinh</div>
	<div class="table">
		<table>
			<tr>
				<th>Ten hoc sinh</th>
				<th>Ngay sinh</th>
				<th>Dia chi</th>
				<th>Lop hoc</th>
			</tr>
			<tr>
				<td>{{$student->name}}</td>
				<td>{{$student->date_of_birth}}</td>
				<td>{{$student->address}}</td>
				<td>{{$student->school->name}}</td>
			</tr>
		</table>
	</div>
	
</div>
</body>
</html>