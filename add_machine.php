<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Cost Calculation</title>
<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="css/custom.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="js/jquery-3.2.0.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body class="">
	<?php include "navbar.php"; ?>
	<h3>Add Machine</h3>
	<div class="col-md-12">
		<form method="post" action="store_machine.php">
			<div class="col-md-12 row">
				<div class="col-md-2">
					<div class="form-group">
				    	<label for="machine_name">Machine Name:</label>
						<input type="text" class="form-control input-sm" id="machine_name" name="machine_name" placeholder="Machine Name" />
				    </div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
				    	<label for="machine_name">Machine Name:</label>
						<input type="text" class="form-control input-sm" id="machine_name" name="machine_name" placeholder="Machine Name" />
				    </div>
				</div>

			</div>
		</form>
	</div>
</body>
</html>