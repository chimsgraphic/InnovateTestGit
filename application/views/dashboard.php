
<div class="alert alert-success"><?php echo "Welcome ".$_SESSION['username']." "."Please select amount to Provide Help Below"?></div>
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
<script>
	function provideHelp() {
    var ask = window.confirm("Are you sure you want to donate?");
    if (ask) {
        window.alert("You have provided help!.");

        document.location.href = "Home/helpprovided";

    }
}
</script>
	<div class="jumbotron col-md-10">
		<div>
		<h2 class="page-header">Please select amount to Provide Help Below</h2>
			<?= form_open('Home/helpprovided') ?>
				<div class="form-group col-md-9">
				<input type="hidden" value="<?php echo $_SESSION['user_id']; ?>" name="phid">
				<input type="hidden" value="<?php echo $_SESSION['username']; ?>" name="uname">
					<select class="form-control" name="amount" required="">
						<option value="5000">5,000</option>
						<option value="10000">10,000</option>
						<option value="50000">50,000</option>
						<option value="100000">100,000</option>
						<option value="200000">200,000</option>
					</select>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-warning">Provide Help</button>
				</div>
			</form>
		</div>
	</div>
</div>