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
<body class="">
	<h3>Been Card Report</h3>
<?php
include_once "db.php"; //include db file
include_once "functions.php";
if(isset($_POST)&&count($_POST)>0){
	if($_POST['order_no']!=''){
		$select = "SELECT brass_detail.*, drawing.* FROM brass_detail LEFT JOIN drawing ON drawing.id=brass_detail.drawing_id WHERE brass_detail.order_no='".$_POST['order_no']."'";
		$res_select = mysqli_query($con, $select);
		$data_select = mysqli_fetch_assoc($res_select);
		if(count($data_select)>0){
			$data_select['date'] = changeDateFormatFetchFromDB($data_select['date']);
		?>
		<div class="col-md-12">
		<form method="post" action="store_data.php">
			<div class="col-md-12 row">
				<div class="col-md-2">
					<div class="form-group">
				    	<label for="drawing_no">Drawing No:</label>
						<input type="text" class="form-control" id="drawing_no" name="drawing_no" placeholder="Customer Drawing No" value="<?php echo $data_select['drawing_no']; ?>" readonly />
				    </div>
				</div>
				<div class="col-md-2">
					<label for="customer_drawing_no" class="text-nowrap">Customer Drawing No:</label>
					<input type="text" class="form-control" id="customer_drawing_no" name="customer_drawing_no" placeholder="Customer Drawing No" value="<?php echo $data_select['customer_drawing_no']; ?>" readonly />
				</div>
				<div class="col-md-4">
					<label for="description">Description:</label>
					<input type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?php echo $data_select['description']; ?>" readonly />
	  			</div>
				<div class="col-md-2">
					
				</div>
				<div class="col-md-2">
					<a href="add_drawing.php">
						<input type="button" name="button" class="btn btn-primary" value="Add Product">	
					</a>
				</div>
			</div>
			<div class="col-md-12 row">
				
			</div>
			<div class="col-md-12 row">
				<div class="col-md-2">
				    <label for="order_no">Job Card No:</label>
				    <div class="input-group">
					    <span class="input-group-addon" id="basic-addon1">JOB</span>
					    <input type="text" class="form-control" id="order_no" value="<?php echo $data_select['order_no']; ?>" name="order_no" placeholder="Order No" readonly />
				    </div>
				</div>
				<div class="col-md-2">
				    <label for="date">Date:</label>
				    <input type="text" class="form-control" id="date" name="date" placeholder="dd/mm/yyyy" value="<?php echo $data_select['date']; ?>" readonly />
				</div>
				<div class="col-md-2">
				    <label for="oa_no">O/A No:</label>
				    <input type="text" class="form-control" id="oa_no" name="oa_no" placeholder="O/A No" value="<?php echo $data_select['oa_no']; ?>" readonly />
				</div>
				<div class="col-md-2">
				    <label for="order_qty">Order Qty:</label>
				    <input type="text" class="form-control" id="order_qty" name="order_qty" placeholder="Order Qty" value="<?php echo $data_select['order_qty']; ?>" readonly />
				</div>
				<div class="col-md-2">
				    <label for="solid_wt">Solid W/T:</label>
				    <input type="text" class="form-control" id="solid_wt" name="solid_wt" placeholder="Solid W/T" value="<?php echo $data_select['solid_wt']; ?>" readonly />
				</div>
				<div class="col-md-2">
				    <label for="finish_wt">Finish W/T:</label>
				    <input type="text" class="form-control" id="finish_wt" name="finish_wt" placeholder="Finish W/T" value="<?php echo $data_select['finish_wt']; ?>" readonly />
				</div>
			</div>
			<div class="col-md-12 row">
				<div class="col-md-2">
				    <label for="chips_wt">Chips W/T:</label>
				    <input type="text" class="form-control" id="chips_wt" name="chips_wt" placeholder="Chips W/T" value="<?php echo $data_select['chips_wt']; ?>" readonly/>
				</div>
				<div class="col-md-2">
				    <label for="required_rod">Total Rod Required:</label>
				    <input type="text" class="form-control" id="required_rod" name="required_rod" placeholder="Total Rod Required" value="<?php echo $data_select['required_rod']; ?>" readonly />
				</div>
				<div class="col-md-2">
				    <label for="rod_rate">Rod Rate:</label>
				    <input type="text" class="form-control" id="rod_rate" name="rod_rate" placeholder="Rod Rate" onkeyup="calculate_price()" value="<?php echo $data_select['rod_rate']; ?>" readonly />
				</div>
				<div class="col-md-2">
				    <label for="chips_rate">Chips Rate:</label>
				    <input type="text" class="form-control" id="chips_rate" name="chips_rate" placeholder="Chips Rate" onkeyup="calculate_price()" value="<?php echo $data_select['chips_rate']; ?>" readonly />
				</div>
				<div class="col-md-2">
				    <label for="labour_cost">Labour Cost:</label>
				    <input type="text" class="form-control" id="labour_cost" name="labour_cost" placeholder="Labour Cost" onkeyup="calculate_price()" value="<?php echo $data_select['labour_cost']; ?>" readonly />
				</div>
				<div class="col-md-2">
				    <label for="assembly_cost">Assembly Cost:</label>
				    <input type="text" class="form-control" id="assembly_cost" name="assembly_cost" placeholder="Assembly Cost" onkeyup="calculate_price()" value="<?php echo $data_select['assembly_cost']; ?>" readonly />
				</div>
			</div>
			<div class="col-md-12 row">
				<div class="col-md-2">
				    <label for="processing_cost">Processing Cost:</label>
				    <input type="text" class="form-control" id="processing_cost" name="processing_cost" placeholder="Processing Cost" onkeyup="calculate_price()" value="<?php echo $data_select['processing_cost']; ?>" readonly />
				</div>
				<div class="col-md-2">
				    <label for="plating_cost">Plating Cost:</label>
				    <input type="text" class="form-control" id="plating_cost" name="plating_cost" placeholder="Plating Cost" onkeyup="calculate_price()" value="<?php echo $data_select['plating_cost']; ?>" readonly />
				</div>
				<div class="col-md-2">
				    <label for="debarring_cost">Debarring Cost:</label>
				    <input type="text" class="form-control" id="debarring_cost" name="debarring_cost" placeholder="Debarring Cost" onkeyup="calculate_price()" value="<?php echo $data_select['debarring_cost']; ?>" readonly />
				</div>
				<div class="col-md-2">
				    <label for="other_cost_1">Other Cost 1:</label>
				    <input type="text" class="form-control" id="other_cost_1" name="other_cost_1" placeholder="Other Cost 1" onkeyup="calculate_price()" value="<?php echo $data_select['other_cost_1']; ?>" readonly />
				</div>
				<div class="col-md-2">
				    <label for="other_cost_2">Other Cost 2:</label>
				    <input type="text" class="form-control" id="other_cost_2" name="other_cost_2" placeholder="Other Cost 2" onkeyup="calculate_price()" value="<?php echo $data_select['other_cost_2']; ?>" readonly />
				</div>
				<div class="col-md-2">
				    <label for="other_cost_3">Other Cost 3:</label>
				    <input type="text" class="form-control" id="other_cost_3" name="other_cost_3" placeholder="Other Cost 3" onkeyup="calculate_price()" value="<?php echo $data_select['other_cost_3']; ?>" readonly />
				</div>
			</div>
			<div class="col-md-12 row">
				<div class="col-md-2">
				    <label for="final_cost">Final Cost:</label>
				    <input type="text" class="form-control" id="final_cost" name="final_cost" placeholder="Final Cost" value="<?php echo $data_select['final_cost']; ?>" readonly />
				</div>
			</div>
			<div class="col-md-12 row">
				<!-- <div class="col-md-2">
					<input type="submit" name="submit" class="btn btn-primary" value="Submit" style="width:100%;">
				</div> -->
				<!-- <div class="col-md-8"></div> -->
				<div class="col-md-2 col-md-offset-10">&nbsp;
					<a href="outward_entry.php?id=<?php echo $data_select['order_no']; ?>">
						<input type="button" name="outward_button" class="btn btn-primary" value="Add Outward" style="width:100%; position:absolute;">	
					</a>
				</div>
				<div class="col-md-2 col-md-offset-10">&nbsp;</div>
			</div>
			<div class="col-md-12 row">
				<div class="col-md-2 col-md-offset-10">&nbsp;
					<a href="inward_entry.php?id=<?php echo $data_select['order_no']; ?>">
						<input type="button" name="inward_button" class="btn btn-primary" value="Add Inward" style="width:100%; position:absolute;">	
					</a>
				</div>
			</div>
		</form>
		</div>
		<div class="row col-md-12 mt-4">
		<?php
			$select_inward = "SELECT * FROM inward_entry WHERE order_no=".$_POST['order_no'];
			$select_outward = "SELECT * FROM outward_entry WHERE order_no=".$_POST['order_no'];

			echo '<div class="table-responsive">';
				echo '<table class="table">';
						echo "<tr>";
							echo "<td>";
							echo '<table class="table table-bordered">';

						echo '<thead>';
						echo "<tr>";
							echo "<th colspan='6'>Outward details</th>";
						echo "</tr>";

						echo '<tr>';
							echo '<th>Date</th>';
							echo '<th>Batch No</th>';
							echo '<th>Size</th>';
							echo '<th class="text-nowrap">Grows Weight</th>';
							echo '<th>Kg</th>';
							echo '<th>Pcs</th>';
						echo '</tr>';
					echo '</thead>';

			$res_outward = mysqli_query($con, $select_outward);
			while ($data_outward = mysqli_fetch_assoc($res_outward)) {
				//print_r($data_outward);
				echo '<tr>';
					echo '<td class="text-nowrap">'.changeDateFormatFetchFromDB($data_outward['date']).'</td>';
					echo '<td>'.$data_outward['batch_no'].'</td>';
					echo '<td>'.$data_outward['size'].'</td>';
					echo '<td>'.$data_outward['gross_weight'].'</td>';
					echo '<td>'.$data_outward['kg'].'</td>';
					echo '<td>'.$data_outward['pcs'].'</td>';
				echo '</tr>';
			}

					echo "</table>";
				echo "</td>";
				echo "<td>";
					echo '<table class="table table-bordered">';

					echo '<thead>';
						echo "<tr>";
							echo "<th colspan='8'>Inward details</th>";
						echo "</tr>";

						echo '<tr>';
							echo '<th>Date</th>';
							echo '<th>Batch No</th>';
							echo '<th>Kg</th>';
							echo '<th class="text-nowrap">100 Pcs W/T</th>';
							echo '<th>Pcs</th>';
							echo '<th class="text-nowrap">Rejection Kg</th>';
							echo '<th class="text-nowrap">Rejection Pcs</th>';
							echo '<th class="text-nowrap">Ok Pcs</th>';
						echo '</tr>';
					echo '</thead>';

			$res_inward = mysqli_query($con, $select_inward);
			while ($data_inward = mysqli_fetch_assoc($res_inward)) {
				echo '<tr>';
					echo '<td class="text-nowrap">'.changeDateFormatFetchFromDB($data_inward['date']).'</td>';
					echo '<td>'.$data_inward['batch_no'].'</td>';
					echo '<td>'.$data_inward['kg'].'</td>';
					echo '<td>'.$data_inward['per_100_wt'].'</td>';
					echo '<td>'.$data_inward['pcs'].'</td>';
					echo '<td>'.$data_inward['rejection_kg'].'</td>';
					echo '<td>'.$data_inward['rejection_pcs'].'</td>';
					echo '<td>'.$data_inward['ok_pcs'].'</td>';
				echo '</tr>';
			}
						echo "</table>";
						echo "</td>";
					echo "</tr>";
				echo "</table>";
			echo '</div>';
		}
		else{
			$_SESSION['error'] = "Job Card ".$_POST['order_no']." not found!";
			error();
		}
	}else{
		$_SESSION['error'] = "Please Enter Job Card No";
		error();
	}
}else{
	$select_job_no = "SELECT MAX(order_no) as order_no FROM brass_detail";
	$res = mysqli_query($con, $select_job_no);
	$data = mysqli_fetch_assoc($res);
	if($data['order_no']==''){
		$data['order_no']=0;
	}

	$select_drawing_dtl = "SELECT * FROM drawing";
	$res_drawing_dtl = mysqli_query($con, $select_drawing_dtl);
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
?>
	<form method="post" action="store_data.php">
		<div class="col-md-12 row">
			<div class="col-md-2">
				<div class="form-group">
			    	<label for="drawing_no">Drawing No:</label>
			    	<select class="form-control" id="drawing_no" name="drawing_no">
			    		<option value="">Select Drawing No</option>
			    		<?php
			    			while ($data_drawing_dtl = mysqli_fetch_assoc($res_drawing_dtl)) {
								echo "<option value='".$data_drawing_dtl['id']."'>".$data_drawing_dtl['drawing_no']."</option>";
							}
						?>
					</select>
			    </div>
			</div>
			<div class="col-md-2">
				<label for="customer_drawing_no">Customer Drawing No:</label>
				<input type="text" class="form-control" id="customer_drawing_no" name="customer_drawing_no" placeholder="Customer Drawing No" required />
			</div>
			<div class="col-md-4">
				<label for="description">Description:</label>
				<input type="text" class="form-control" id="description" name="description" placeholder="Description" required />
  			</div>
			<div class="col-md-2">
				
			</div>
			<div class="col-md-2">
				<a href="add_drawing.php">
					<input type="button" name="button" class="btn btn-primary" value="Add Product">	
				</a>
			</div>
		</div>
		<div class="col-md-12 row">
			
		</div>
		<div class="col-md-12 row">
			<div class="col-md-2">
			    <label for="order_no">Job Card No:</label>
			    <div class="input-group">
				    <span class="input-group-addon" id="basic-addon1">JOB</span>
				    <input type="text" class="form-control" id="order_no" value="<?php echo $data['order_no']+1; ?>" name="order_no" placeholder="Order No" required />
			    </div>
			</div>
			<div class="col-md-2">
			    <label for="date">Date:</label>
			    <input type="text" class="form-control" id="date" name="date" placeholder="dd/mm/yyyy" required />
			</div>
			<div class="col-md-2">
			    <label for="oa_no">O/A No:</label>
			    <input type="text" class="form-control" id="oa_no" name="oa_no" placeholder="O/A No" required />
			</div>
			<div class="col-md-2">
			    <label for="order_qty">Order Qty:</label>
			    <input type="text" class="form-control" id="order_qty" name="order_qty" placeholder="Order Qty" />
			</div>
			<div class="col-md-2">
			    <label for="solid_wt">Solid W/T:</label>
			    <input type="text" class="form-control" id="solid_wt" name="solid_wt" placeholder="Solid W/T" />
			</div>
			<div class="col-md-2">
			    <label for="finish_wt">Finish W/T:</label>
			    <input type="text" class="form-control" id="finish_wt" name="finish_wt" placeholder="Finish W/T" />
			</div>
			<div class="col-md-2">
			    <label for="chips_wt">Chips W/T:</label>
			    <input type="text" class="form-control" id="chips_wt" name="chips_wt" placeholder="Chips W/T" />
			</div>
			<div class="col-md-2">
			    <label for="required_rod">Total Rod Required:</label>
			    <input type="text" class="form-control" id="required_rod" name="required_rod" placeholder="Total Rod Required" />
			</div>
			<div class="col-md-2">
			    <label for="rod_rate">Rod Rate:</label>
			    <input type="text" class="form-control" id="rod_rate" name="rod_rate" placeholder="Rod Rate" onkeyup="calculate_price()" />
			</div>
			<div class="col-md-2">
			    <label for="chips_rate">Chips Rate:</label>
			    <input type="text" class="form-control" id="chips_rate" name="chips_rate" placeholder="Chips Rate" onkeyup="calculate_price()" />
			</div>
			<div class="col-md-2">
			    <label for="labour_cost">Labour Cost:</label>
			    <input type="text" class="form-control" id="labour_cost" name="labour_cost" placeholder="Labour Cost" onkeyup="calculate_price()" />
			</div>
			<div class="col-md-2">
			    <label for="assembly_cost">Assembly Cost:</label>
			    <input type="text" class="form-control" id="assembly_cost" name="assembly_cost" placeholder="Assembly Cost" onkeyup="calculate_price()" />
			</div>
			<div class="col-md-2">
			    <label for="processing_cost">Processing Cost:</label>
			    <input type="text" class="form-control" id="processing_cost" name="processing_cost" placeholder="Processing Cost" onkeyup="calculate_price()" />
			</div>
			<div class="col-md-2">
			    <label for="plating_cost">Plating Cost:</label>
			    <input type="text" class="form-control" id="plating_cost" name="plating_cost" placeholder="Plating Cost" onkeyup="calculate_price()" />
			</div>
			<div class="col-md-2">
			    <label for="debarring_cost">Debarring Cost:</label>
			    <input type="text" class="form-control" id="debarring_cost" name="debarring_cost" placeholder="Debarring Cost" onkeyup="calculate_price()" />
			</div>
			<div class="col-md-2">
			    <label for="other_cost_1">Other Cost 1:</label>
			    <input type="text" class="form-control" id="other_cost_1" name="other_cost_1" placeholder="Other Cost 1" onkeyup="calculate_price()" />
			</div>
			<div class="col-md-2">
			    <label for="other_cost_2">Other Cost 2:</label>
			    <input type="text" class="form-control" id="other_cost_2" name="other_cost_2" placeholder="Other Cost 2" onkeyup="calculate_price()" />
			</div>
			<div class="col-md-2">
			    <label for="other_cost_3">Other Cost 3:</label>
			    <input type="text" class="form-control" id="other_cost_3" name="other_cost_3" placeholder="Other Cost 3" onkeyup="calculate_price()" />
			</div>
			<div class="col-md-2">
			    <label for="final_cost">Final Cost:</label>
			    <input type="text" class="form-control" id="final_cost" name="final_cost" placeholder="Final Cost" />
			</div>
		<div class="col-md-12 row mt-1">
			<div class="col-md-2">
				<input type="submit" name="submit" class="btn btn-primary" value="Submit" style="width:100%;">
			</div>
			<div class="col-md-8"></div>
			<div class="col-md-2">
				<a href="outward_entry.php">
					<input type="button" name="outward_button" class="btn btn-primary" value="Add Outward" style="width:100%; position:absolute;">	
				</a>
			</div>
		</div>
		<div class="col-md-12 row mt-1">
			<div class="col-md-10"></div>
			<div class="col-md-2">
				<a href="inward_entry.php">
					<input type="button" name="inward_button" class="btn btn-primary" value="Add Inward" style="width:100%; position:absolute;">	
				</a>
			</div>
		</div>
	</form>
<?php
}
?>
	<script src="js/custom.js"></script>
</body>
</html>