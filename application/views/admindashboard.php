
<div class="alert alert-info"><?php echo "Logged In ".$_SESSION['username']." "?></div>
<div class="row">
		<?php if (validation_errors()) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= validation_errors() ?>
				</div>
			</div>
		<?php endif; ?>
<?php if (isset($error)) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= $error ?>
				</div>
			</div>
		<?php endif; ?>
<div class="container">
	<div class="jumbotron col-md-10">
		<div>
		<h2 class="page-header">People Who Provided Help</h2>
			<a href="phusers" class="btn btn-danger">View Newly Provided Help</a>
			<a href="phusers" class="btn btn-success">View Newly Gotten Help</a>
		</div>
	</div>
</div>