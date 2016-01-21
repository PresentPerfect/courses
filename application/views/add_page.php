<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add Course View</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<style type="text/css">
		.container {
			margin: 20px;
		}
	</style>
</head>
<body>
	<div class='container'>
		<h3>Add a new course</h3>
		<div class='form'>
			<form role='form' action='mains/add_course' method='post'>
<?php   		if ($this->session->flashdata('error_msg'))
				{
?>
					<div class='text-danger'>
<?=						$this->session->flashdata('error_msg');
?>
					</div>
<?php
				}
?>
				<div class='form-group'>
					<label for='course_name'>Course Name:</label>
					<input class='form-control' type='text' name='course_name'>
				</div>
				<div class='form-group'>
					<label for='description'>Description:</label>
					<input class='form-control' type='text' name='description'>
				</div>
				<button class='btn btn-primary' type='submit'>Add</button>
			</form>
		</div>
		<h3>Courses</h3>
		<table class='table table-bordered'>
			<thead>
				<tr>
					<th>Course Name</th>
					<th>Description</th>
					<th>Date Added</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
<?php   		foreach($all_courses as $course )
				{
					$time = strtotime($course['updated_at']);

?>
				<tr>
					<td><?=  $course['course_name'] ?></td>
					<td><?=  $course['description'] ?></td>
					<td><?=  date('D d M Y, g:i:s A', $time) ?></td>
					<td><a href="/mains/remove/<?= $course['id'] ?>">remove</a></td>
				</tr>
<?php   		}
?>
			</tbody>
		</table>
			


	</div>	
</body>
</html>