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
	<h3>Cost Calculation</h3>
	<div class="col-md-12">
		<?php if(isset($_SESSION['error'])&&$_SESSION['error']!=""){ ?>
		<div class="alert alert-danger">
		  	<?php echo $_SESSION['error']; session_destroy(); ?>
		</div>
		<?php } ?>
		<form method="post" action="store_cost_calculation.php">
			<div class="col-md-12 row">
				<div class="col-md-2">
					<div class="form-group">
				    	<label for="ampl_part_no">AMPL Part No:</label>
						<input type="text" class="form-control input-sm" id="ampl_part_no" name="ampl_part_no" placeholder="AMPL Part No" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label for="rod_size">Rod Size:</label>
						<input type="text" class="form-control input-sm" id="rod_size" name="rod_size" placeholder="Rod Size" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label for="drawing_no">Drawign No:</label>
						<input type="text" class="form-control input-sm" id="drawing_no" name="drawing_no" placeholder="Drawing No" />
				    </div>
				</div>
			</div>
			<div class="col-md-12 row">
				<div class="col-md-2">
				    <div class="form-group">
				    	<label for="basic_rate">Basic Rate:</label>
						<input type="text" class="form-control input-sm" id="basic_rate" name="basic_rate" placeholder="Basic Rate" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label for="job_charge">Job Charge:</label>
						<input type="text" class="form-control input-sm" id="job_charge" name="job_charge" placeholder="Job Charge" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label for="size_premimum">Size Premium:</label>
						<input type="text" class="form-control input-sm" id="size_premimum" name="size_premimum" placeholder="Size Premium" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label for="loe">LOE:</label>
						<input type="text" class="form-control input-sm" id="loe" name="loe" placeholder="LOE" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label for="holo">HOLO:</label>
						<input type="text" class="form-control input-sm" id="holo" name="holo" placeholder="HOLO" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label for="twenty_per">2.20%:</label>
						<input type="text" class="form-control input-sm" id="twenty_per" name="twenty_per" placeholder="2.20%" tabindex = "-1" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label for="rod_rate">Rod Rate:</label>
						<input type="text" class="form-control input-sm" id="rod_rate" name="rod_rate" placeholder="Rod Rate" tabindex = "-1" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label for="chips_rate">Chips Rate:</label>
						<input type="text" class="form-control input-sm" id="chips_rate" name="chips_rate" placeholder="Chips Rate" />
				    </div>
				</div>
			</div>
			<div class="col-md-12 row">
				<div class="col-md-2">
				    <div class="form-group">
				    	<label for="solid_wait">Solid Wait:</label>
						<input type="text" class="form-control input-sm" id="solid_wait" name="solid_wait" placeholder="Solid Wait" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label for="finish_wait">Finish Wait:</label>
						<input type="text" class="form-control input-sm" id="finish_wait" name="finish_wait" placeholder="Finish Wait" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label for="chips_wait">Chips Wait:</label>
						<input type="text" class="form-control input-sm" id="chips_wait" name="chips_wait" placeholder="Chips Wait" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label for="solid_amount">Solid Amount:</label>
						<input type="text" class="form-control input-sm" id="solid_amount" name="solid_amount" placeholder="Solid Amount" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label for="chips_reclaim">Chips Reclaim:</label>
						<input type="text" class="form-control input-sm" id="chips_reclaim" name="chips_reclaim" placeholder="Chips Reclaim" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label for="net_material_amount">Net Material Amount:</label>
						<input type="text" class="form-control input-sm" id="net_material_amount" name="net_material_amount" placeholder="Net Material Amount" />
				    </div>
				</div>
			</div>
			<!-- Part one over -->

			<!-- Part two start -->
			<div class="col-md-12 row">
				<div class="col-md-12">
					<label>Machine Details:</label>
				</div>
			</div>
			<div class="col-md-12 row">
				<div class="col-md-2">
				    <div class="form-group">
				    	<label class="text-nowrap" for="pallet_cycle_time">Pallet Cycle Time:</label>
						<input type="text" class="form-control input-sm" id="pallet_cycle_time" name="pallet_cycle_time" placeholder="Pallet Cycle Time" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label class="text-nowrap" for="piece_per_pallete">Piece Per Pallete:</label>
						<input type="text" class="form-control input-sm" id="piece_per_pallete" name="piece_per_pallete" placeholder="Piece Per Pallete" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label class="text-nowrap" for="one_piece_cycle_time">One Piece Cycle Time:</label>
						<input type="text" class="form-control input-sm" id="one_piece_cycle_time" name="one_piece_cycle_time" placeholder="One piece Cycle Time" />
				    </div>
				</div>
				<!-- <div class="col-md-2">
				    <div class="form-group">
				    	<label class="text-nowrap" for="drawing_no">Drawing No:</label>
						<input type="text" class="form-control input-sm" id="piece_per_pallete" name="piece_per_pallete" placeholder="Piece Per Pallete" />
				    </div>
				</div> -->
				<div class="col-md-2">
				    <div class="form-group">
				    	<label class="text-nowrap" for="time_of_mfg">Time Of MFG:</label>
						<input type="text" class="form-control input-sm" id="time_of_mfg" name="time_of_mfg" placeholder="Time Of MFG" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label class="text-nowrap" for="total_pcs">Total Pcs:</label>
						<input type="text" class="form-control input-sm" id="total_pcs" name="total_pcs" placeholder="Total Pcs" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label class="text-nowrap" for="pcs_per_hour">Pcs Per Hour:</label>
						<input type="text" class="form-control input-sm" id="pcs_per_hour" name="pcs_per_hour" placeholder="Pcs Per Hour" />
				    </div>
				</div>
			</div>
			<div class="col-md-12 row">
				<div class="col-md-2">
				    <div class="form-group">
				    	<label class="text-nowrap" for="per_days_hour">Per Days Hour:</label>
						<input type="text" class="form-control input-sm" id="per_days_hour" name="per_days_hour" placeholder="Per Days Hour" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label class="text-nowrap" for="pcs_per_23_hrs">Pcs Per 23 Hours:</label>
						<input type="text" class="form-control input-sm" id="pcs_per_23_hrs" name="pcs_per_23_hrs" placeholder="Pcs Per 23 Hours" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label class="text-nowrap" for="month_per_day">Month Per Days:</label>
						<input type="text" class="form-control input-sm" id="month_per_day" name="month_per_day" placeholder="Month Per Days" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label class="text-nowrap" for="total_pcs_25_days">Total Pcs 25 Days:</label>
						<input type="text" class="form-control input-sm" id="total_pcs_25_days" name="total_pcs_25_days" placeholder="Total Pcs 25 Days" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label class="text-nowrap" for="cnc_exp_month">CNC EXP. Month:</label>
						<input type="text" class="form-control input-sm" id="cnc_exp_month" name="cnc_exp_month" placeholder="Total Pcs 25 Days" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label class="text-nowrap" for="per_pcs_labour">Per Pcs Labour:</label>
						<input type="text" class="form-control input-sm" id="per_pcs_labour" name="per_pcs_labour" placeholder="Per Pcs Labour" />
				    </div>
				</div>
			</div>
			<div class="col-md-12 row">
				<div class="col-md-2">
				    <div class="form-group">
				    	<label class="text-nowrap" for="kg_per_hour">Kg Per Hour:</label>
						<input type="text" class="form-control input-sm" id="kg_per_hour" name="kg_per_hour" placeholder="Kg Per Hour" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label class="text-nowrap" for="wait_per_100_pcs">Wait Per 100 Pcs:</label>
						<input type="text" class="form-control input-sm" id="wait_per_100_pcs" name="wait_per_100_pcs" placeholder="Wait Per 100 Pcs" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label class="text-nowrap" for="labour_per_kg">Labour Per Kg:</label>
						<input type="text" class="form-control input-sm" id="labour_per_kg" name="labour_per_kg" placeholder="Labour Per Kg" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label class="text-nowrap" for="quentity">Quentity:</label>
						<input type="text" class="form-control input-sm" id="quentity" name="quentity" placeholder="Quentity" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label class="text-nowrap" for="days">Days:</label>
						<input type="text" class="form-control input-sm" id="days" name="days" placeholder="Days" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label class="text-nowrap" for="holidays">Holidays:</label>
						<input type="text" class="form-control input-sm" id="holidays" name="holidays" placeholder="Holidays" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label class="text-nowrap" for="weekly_off">Weekly Off:</label>
						<input type="text" class="form-control input-sm" id="weekly_off" name="weekly_off" placeholder="Weekly Off" />
				    </div>
				</div>
			</div>
			<div class="col-md-12 row">
				<div class="col-md-2">
				    <div class="form-group">
				    	<label class="text-nowrap" for="start_date">Start Date:</label>
						<input type="text" class="form-control input-sm" id="start_date" name="start_date" placeholder="DD/MM/YYYY" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label class="text-nowrap" for="end_date">End Date:</label>
						<input type="text" class="form-control input-sm" id="end_date" name="end_date" placeholder="DD/MM/YYYY" />
				    </div>
				</div>
			</div>
			<!-- Part two over -->

			<!-- Part three start -->
			<div class="col-md-12 row">
				<div class="col-md-2">
				    <div class="form-group">
				    	<label class="text-nowrap" for="cnc_production_count">CNC Production Pcs/Hour:</label>
						<input type="text" class="form-control input-sm" id="cnc_production_count" name="cnc_production_count" placeholder="CNC Production Pcs/Hour" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label for="labour_cost">Labour Cost:</label>
						<input type="text" class="form-control input-sm" id="labour_cost" name="labour_cost" placeholder="Labour Cost" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label for="machine_expense">Expense per Machine:</label>
						<input type="text" class="form-control input-sm" id="machine_expense" name="machine_expense" placeholder="Expense per Machine" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label for="total_labour">Total Labour:</label>
						<input type="text" class="form-control input-sm" id="total_labour" name="total_labour" placeholder="Total Labour" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label for="pf_20_per">20% PF:</label>
						<input type="text" class="form-control input-sm" id="pf_20_per" name="pf_20_per" placeholder="20% PF" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label for="total_labour_pf">Total Labour PF:</label>
						<input type="text" class="form-control input-sm" id="total_labour_pf" name="total_labour_pf" placeholder="Total Labour PF" />
				    </div>
				</div>
			</div>
			<div class="col-md-12 row">
				<div class="col-md-2">
				    <div class="form-group">
				    	<label for="platting_kg">Plating Kg:</label>
						<input type="text" class="form-control input-sm" id="platting_kg" name="platting_kg" placeholder="Plating Kg" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label for="platting_amount">Plating Amount:</label>
						<input type="text" class="form-control input-sm" id="platting_amount" name="platting_amount" placeholder="Plating Amount" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label for="extra_charge">Extra Charge:</label>
						<input type="text" class="form-control input-sm" id="extra_charge" name="extra_charge" placeholder="Extra Charge" />
				    </div>
				</div>
			</div>
			<div class="col-md-12 row">
				<div class="col-md-2">
				    <div class="form-group">
				    	<label for="material_vabour_cost" class="text-nowrap">Material + Labour Cost:</label>
						<input type="text" class="form-control input-sm" id="material_vabour_cost" name="material_vabour_cost" placeholder="Material + Labour Cost" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label for="euro" class="text-nowrap">Euro:</label>
						<input type="text" class="form-control input-sm" id="euro" name="euro" placeholder="Euro" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label for="final_inr" class="text-nowrap">Final INR:</label>
						<input type="text" class="form-control input-sm" id="final_inr" name="final_inr" placeholder="Final INR" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label for="percentage" class="text-nowrap">%:</label>
						<input type="text" class="form-control input-sm" id="percentage" name="percentage" placeholder="Percentage" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label for="quentity" class="text-nowrap">Quentity:</label>
						<input type="text" class="form-control input-sm" id="quentity" name="quentity" placeholder="Quentity" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
				    	<label for="rod_kg" class="text-nowrap">Rod Kg:</label>
						<input type="text" class="form-control input-sm" id="rod_kg" name="rod_kg" placeholder="Rod Kg" />
				    </div>
				</div>
				<div class="col-md-2">
				    <div class="form-group">
						<input type="submit" class="form-control input-sm" id="submit" name="submit" value="submit" />
				    </div>
				</div>
			</div>
		</form>
	</div>
	<script src="js/custom.js"></script>
</body>
</html>