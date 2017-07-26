<div class="container">
	<div class="row">
		<div class="col-md-4 text-center marketing">
			<div class="card">
				<div class="card-block">
			    	<h2 class="card-title"><?= $files->total_size; ?></h2>
			    	<p class="card-text">Are curently stored in our system</p>
				</div>
			</div>
		</div>
		<div class="col-md-4 text-center marketing">
			<div class="card">
				<div class="card-block">
			    	<h2 class="card-title"><?= $files->total_files; ?></h2>
			    	<p class="card-text">Files already uploaded</p>
				</div>
			</div>
		</div>
		<div class="col-md-4 text-center marketing">
			<div class="card">
				<div class="card-block">
			    	<h2 class="card-title"><?= $files->last_upload; ?></h2>
			    	<p class="card-text">Last upload</p>
				</div>
			</div>
		</div>
	</div>
</div>