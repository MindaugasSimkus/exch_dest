<?php
	include 'Classes/DB.php';
	include 'Classes/Files.php';
	include 'config.php';

	$files = new Files();
	$files->downloadFile($_GET['crypt']);
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
				<div class="col-md-8 ">

					<?php 
						if (isset($files->error)) {
							echo '<div class="alert alert-danger" role="alert"> <strong>Oh snap!</strong> ' . $files->error . ' </div>';
						} else {
							//forma
							echo '<h2>Your file <b>' . $files->file_name . '</b> is ready for download</h2>
								<p><b>File size:</b>'.  $files->file_size . ' bytes.</p>
								<p><b>Uploaded:</b>' . $files->upload_time . '</p>
								<p>
									<a class="btn btn-lg btn-secondary" download href="'. SITEURL.'files/'. $files->encoded_file_name.'">Download</a>
								</p>';
						}
					?>

				</div>
			</div>
		</div>
		<?php include 'inc/cards.php' ?>
	</div>
</body>
</html>
