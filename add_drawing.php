<?php
include_once "db.php";

?>
<!DOCTYPE html>
<html>
<head>
<title>Add Drawing</title>
<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="css/custom.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="js/jquery-3.2.0.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body class="container">
	<h3>Add New Drawing</h3>
	<?php if(isset($_SESSION['error'])&&$_SESSION['error']!=""){ ?>
	<div class="alert alert-danger">
	  	<?php echo $_SESSION['error']; session_destroy(); ?>
	</div>
	<?php } ?>
	<form method="post" action="store_drawing.php">
		<div class="col-md-12 row">
			<div class="col-md-2">
				<label for="drg_type">Drawing No:</label>
				<input type="text" class="form-control" id="drg_type" name="drg_type" placeholder="Drawing Type">
			</div>
			<div class="col-md-2">
				<label for="drg_no">Customer Drawing No:</label>
				<input type="text" class="form-control" id="drg_no" name="drg_no" placeholder="Drawing No" required />
			</div>
		</div>
		<div class="col-md-12 row">
			<div class="col-md-4">
				<label for="description">Description:</label>
				<input type="text" class="form-control" id="description" name="description" placeholder="Description" required />
  			</div>
		</div>
		<div class="col-md-12 row mt-1">
			<div class="col-md-2">
				<input type="submit" name="submit" class="btn btn-primary" value="Add Drawing">
			</div>
		</div>
	</form>
</body>
</html>