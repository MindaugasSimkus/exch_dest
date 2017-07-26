<?php
	include 'Classes/DB.php';
	include 'Classes/Files.php';
	include 'config.php';

	$files = new Files();
?>

<!DOCTYPE html>
<html>
<head>
	<title><?= TITLE ;?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="page">
		<?php include 'inc/header.php' ?>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<form method="POST" enctype="multipart/form-data" action="upload.php">
			            <label class="upload btn btn-block btn-primary col-md-6 offset-md-3">
			                Select file.. <input type="file" name="file" style="display: none;">
			            </label>
						<button class="button form-control form-control-lg col-md-6 offset-md-3" type="submit">Upload it!</button>
					</form>
				</div>
			</div>
		</div>
		<?php include 'inc/cards.php' ?>
	</div>
</body>
</html>