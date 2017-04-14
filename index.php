<?php
include_once "db.php"; //include db file
$select_job_no = "SELECT MAX(order_no) as order_no FROM brass_detail";
$res = mysqli_query($con, $select_job_no);
$data = mysqli_fetch_assoc($res);
if($data['order_no']==''){
	$data['order_no']=0;
}

$select_drawing_dtl = "SELECT * FROM drawing";
$res_drawing_dtl = mysqli_query($con, $select_drawing_dtl);
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
	<h3>Been Card Report</h3>
	<?php if(isset($_SESSION['error'])&&$_SESSION['error']!=""){ ?>
	<div class="alert alert-danger">
	  	<?php echo $_SESSION['error']; session_destroy(); ?>
	</div>
	<?php } ?>
	<?php if(isset($_SESSION['success'])&&$_SESSION['success']!=""){ ?>
	<div class="alert alert-success">
	  	<?php echo $_SESSION['success']; session_destroy(); ?>
	</div>
	<?php } ?>
	<form method="post" action="store_data.php">
		<div class="col-md-12 row">
			<div class="col-md-2">
				<div class="form-group">
			    	<label for="drg_type">Drawing No:</label>
			    	<select class="form-control" id="drg_type" name="drg_type">
			    		<option value="">Select Drawing No</option>
			    		<?php
			    			while ($data_drawing_dtl = mysqli_fetch_assoc($res_drawing_dtl)) {
								echo "<option value='".$data_drawing_dtl['id']."'>".$data_drawing_dtl['drg_type']."</option>";
							}
						?>
					</select>
			    </div>
			</div>
			<div class="col-md-2">
				<label for="drg_no">Customer Drawing No:</label>
				<input type="text" class="form-control" id="drg_no" name="drg_no" placeholder="Drawing No" required />
			</div>
			<div class="col-md-4">
				<label for="description">Description:</label>
				<input type="text" class="form-control" id="description" name="description" placeholder="Description" required />
  			</div>
			<div class="col-md-3">
				
			</div>
			<div class="col-md-1">
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
			    <input type="text" class="form-control" id="date" name="date" placeholder="mm/dd/yyyy" required />
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
			    <input type="text" class="form-control" id="rod_rate" name="rod_rate" placeholder="Rod Rate" />
			</div>
			<div class="col-md-2">
			    <label for="chips_rate">Chips Rate:</label>
			    <input type="text" class="form-control" id="chips_rate" name="chips_rate" placeholder="Chips Rate" />
			</div>
			<div class="col-md-2">
			    <label for="labour_cost">Labour Cost:</label>
			    <input type="text" class="form-control" id="labour_cost" name="labour_cost" placeholder="Labour Cost" />
			</div>
			<div class="col-md-2">
			    <label for="assembly_cost">Assembly Cost:</label>
			    <input type="text" class="form-control" id="assembly_cost" name="assembly_cost" placeholder="Assembly Cost" />
			</div>
			<div class="col-md-2">
			    <label for="processing_cost">Processing Cost:</label>
			    <input type="text" class="form-control" id="processing_cost" name="processing_cost" placeholder="Processing Cost" />
			</div>
			<div class="col-md-2">
			    <label for="plating_cost">Plating Cost:</label>
			    <input type="text" class="form-control" id="plating_cost" name="plating_cost" placeholder="Plating Cost" />
			</div>
			<div class="col-md-2">
			    <label for="debarring_cost">Debarring Cost:</label>
			    <input type="text" class="form-control" id="debarring_cost" name="debarring_cost" placeholder="Debarring Cost" />
			</div>
			<div class="col-md-2">
			    <label for="other_cost_1">Other Cost 1:</label>
			    <input type="text" class="form-control" id="other_cost_1" name="other_cost_1" placeholder="Other Cost 1" />
			</div>
			<div class="col-md-2">
			    <label for="other_cost_2">Other Cost 2:</label>
			    <input type="text" class="form-control" id="other_cost_2" name="other_cost_2" placeholder="Other Cost 2" />
			</div>
			<div class="col-md-2">
			    <label for="other_cost_3">Other Cost 3:</label>
			    <input type="text" class="form-control" id="other_cost_3" name="other_cost_3" placeholder="Other Cost 3" />
			</div>
			<div class="col-md-2">
			    <label for="final_cost">Final Cost:</label>
			    <input type="text" class="form-control" id="final_cost" name="final_cost" placeholder="Final Cost" />
			</div>
		<div class="col-md-12 row mt-1">
			<div class="col-md-2">
				<input type="submit" name="submit" class="btn btn-primary" value="submit">
			</div>
		</div>
	</form>
</body>
<script type="text/javascript">
	//auto date fillup on load script start
	var today = new Date();
	var dd = today.getDate(); //day
	var mm = today.getMonth()+1; //month
	var yyyy = today.getFullYear(); //year
	if(dd<10){
	    dd='0'+dd; //day formater
	}
	if(mm<10){
	    mm='0'+mm; //month formater
	}
	var today = dd+'/'+mm+'/'+yyyy;
	document.getElementById("date").value = today;
	//auto date fillup on load script end

	//new
	//start
	$('#finish_wt').keyup(function(){
		var finish_wt_val = $('#finish_wt').val();
		var solid_wt_val = $('#solid_wt').val();
		var chips_wt_val = solid_wt_val-finish_wt_val;
		$('#chips_wt').val(chips_wt_val);
	});

	$('#solid_wt').keyup(function(){
		var solid_wt_val = $('#solid_wt').val();
		var order_qty_val = $('#order_qty').val();
		var required_rod_val = order_qty_val*solid_wt_val;
		$('#required_rod').val(required_rod_val);
	});
	//end

	//autofill description and drawing name start
	$("#drg_type").change(function(){
		var drawing_id = $('#drg_type').val();
	    $.ajax({
	    	type: "GET",
	    	url: "fetch.php?drawing_id="+drawing_id,
	    	dataType: "json",
	    	success: function (data){
	    		if(data['drg_no']!='undefined'){
	    			$('#drg_no').val(data['drg_no']);
	    		}
	    		if(data['description']!='undefined'){
	    			$('#description').val(data['description']);
	    		}
	    	}
        });
	});
	//autofill description and drawing name end
</script>
</html>