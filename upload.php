<?php

	include 'Classes/DB.php';
	include 'Classes/Files.php';
	include 'config.php';


	$files = new Files();

	$files->uploadFile($_FILES['file']);



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
				<div class="col-md-8">
					<?php 
					if (isset($files->error)) {
						echo '<div class="alert alert-danger" role="alert"> <strong>Oh snap!</strong> ' . $files->error . ' </div>';
					} else {
						echo ' <h2>Your file has been uploaded</h2>
					<p><b>File name:</b> ' . $files->file_name . '</p>
					<p><b>File size:</b> ' . $files->file_size . ' bytes.</p>
					<p>File link: <a href="' . SITEURL . 'download.php?crypt=' . $files->crypt . '">' . SITEURL . 'download.php?crypt=' . $files->crypt . '</a></p>';
					}
					?>

				</div>
			</div>
		</div>
		<?php include 'inc/cards.php' ?>
	</div>
</body>
</html>
