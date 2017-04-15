<!DOCTYPE html>
<html>
<head>
<title>Add Outward Entry</title>
<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="css/custom.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="js/jquery-3.2.0.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body class="container">
	<h3>Add Inward Entry</h3>
<?php 
session_start();
include_once "db.php"; //include db file
include_once "functions.php";
if(isset($_GET)&&count($_GET)>0){
	if(isset($_GET['id'])&&$_GET['id']!=''){
		if(isset($_SESSION['error'])&&$_SESSION['error']!=""){
			echo '<div class="alert alert-danger">';
				echo $_SESSION['error']; session_destroy();
			echo '</div>';
		}
		if(isset($_SESSION['success'])&&$_SESSION['success']!=""){
			echo '<div class="alert alert-success">';	
				echo $_SESSION['success']; session_destroy();
			echo '</div>';
		}
		$select = "SELECT order_no FROM brass_detail WHERE order_no='".$_GET['id']."'";
		$res_select = mysqli_query($con, $select);
		$data_select = mysqli_fetch_assoc($res_select);
		if(count($data_select)>0){
		?>
			<form method="post" action="store_inward.php">
				<input type="hidden" name="order_no" value="<?php echo $data_select['order_no']; ?>">
				<div class="col-md-12 row">
					<div class="col-md-2">
					    <label for="date">Date:</label>
					    <input type="text" class="form-control" id="date" name="date" placeholder="dd/mm/yyyy" required />
					</div>
					<div class="col-md-2">
					    <label for="batch_no">Batch No:</label>
					    <input type="text" class="form-control" id="batch_no" name="batch_no" placeholder="Batch No" required />
					</div>
					<div class="col-md-2">
					    <label for="kg">Kg:</label>
					    <input type="text" class="form-control" id="kg" name="kg" placeholder="Kg" required />
					</div>
					<div class="col-md-2">
					    <label for="per_100_wt">100 Pcs Wait:</label>
					    <input type="text" class="form-control" id="per_100_wt" name="per_100_wt" placeholder="100 Pcs Wait" required />
					</div>
					<div class="col-md-2">
					    <label for="pcs">Pcs:</label>
					    <input type="text" class="form-control" id="pcs" name="pcs" placeholder="Pcs" required />
					</div>
				</div>
				<div class="col-md-12 row">
					<div class="col-md-2">
					    <label for="rejection_kg">Rejection Kg:</label>
					    <input type="text" class="form-control" id="rejection_kg" name="rejection_kg" placeholder="Rejection Kg" required />
					</div>
					<div class="col-md-2">
					    <label for="rejection_pcs">Rejection Pcs:</label>
					    <input type="text" class="form-control" id="rejection_pcs" name="rejection_pcs" placeholder="Rejection Pcs" required />
					</div>
					<div class="col-md-2">
					    <label for="ok_pcs">Ok Pcs:</label>
					    <input type="text" class="form-control" id="ok_pcs" name="ok_pcs" placeholder="Ok Pcs" required />
					</div>
				</div>
				<div class="col-md-12 row mt-1">
					<div class="col-md-2">
						<input type="submit" name="submit" class="btn btn-primary" value="Submit" style="width:100%;">
					</div>
				</div>
			</form>
		<?php
		}
		else{
			$_SESSION['error'] = "Bed Request!!";
			error();	
		}
	}
	else{
		$_SESSION['error'] = "Bed Request!!";
		error();	
	}
}
else{
	$_SESSION['error'] = "Bed Request!!";
	error();
}
?>
	<script src="js/custom.js"></script>
</body>
</html>