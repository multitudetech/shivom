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
<body class="container" style="background-color: #eee; padding-top: 40px;">
	<div class="row">
		<h3 class="col-md-3 col-centered">Please Login</h3>
	</div>
	<form method="post" action="handle_login.php">
	<div class="row">
		<div class="col-md-3 col-centered">
			<label for="user_name">User Name:</label>
			<input type="text" class="form-control" id="user_name" name="user_name" placeholder="User Name" />
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 col-centered">
			<label for="password">Password:</label>
			<input type="text" class="form-control" id="password" name="password" placeholder="password" />
		</div>
	</div>
	<div class="row mt-1">
	<div class="col-md-3 col-centered">
			<input type="submit" name="submit" class="btn btn-primary" value="Log In" style="width:100%;">
		</div>
	</div>
	</form>
</body>
</html>