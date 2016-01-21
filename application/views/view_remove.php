<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Courses Remove View Page</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<style type="text/css">
		.container {
			margin: 20px;
		}
		button {
			margin-right: 20px;
		}
	</style>
</head>
<body>
	<div class='container'>
		<h2>Are you sure you want to delete the following course?</h2>
		<div class='panel panel-default'>
			<div class='panel-body'>
				<p>Name: <?=  $course_by_id['course_name'] ?></p>
				<p>Description:  <?=  $course_by_id['description']  ?></p>		
			</div>
		</div>
		<a href="/"><button class='btn btn-primary'>No</button></a>
		<a href="/mains/delete_course/<?= $course_by_id['id'] ?>"><button class='btn btn-danger'>Yes! I want to delete this</button></a>



	</div>
</body>
</html>