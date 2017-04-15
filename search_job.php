<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Been Card Report</title>
<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="css/custom.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="js/jquery-3.2.0.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body class="container">
	<h3>Search Job</h3>
	<?php if(isset($_SESSION['error'])&&$_SESSION['error']!=""){ ?>
	<div class="alert alert-danger">
	  	<?php echo $_SESSION['error']; session_destroy(); ?>
	</div>
	<?php } ?>
	<form method="post" action="index.php">
		<div class="col-md-12 row">
			<div class="col-md-2">
			    <label for="order_no">Job Card No:</label>
			    <div class="input-group">
				    <span class="input-group-addon" id="basic-addon1">JOB</span>
				    <input type="text" class="form-control" id="order_no" name="order_no" placeholder="Order No" required />
			    </div>
			</div>
		</div>
		<div class="col-md-12 row mt-1">
			<div class="col-md-2">
				<input type="submit" name="submit" class="btn btn-primary" value="Search" style="width:100%;">
			</div>
		</div>
	</form>
</body>
</html>