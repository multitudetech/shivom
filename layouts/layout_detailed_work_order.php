<?php
$valid_wo = true;
$machine_data = get_machine_detail();
if(isset($_GET['editwo'])){
	if(is_numeric($_GET['id'])&&$_GET['id']>0){
		$_id = $_GET['id'];
		$data = get_wo_detail_by_id($_id);
		if(count($data)==0){
			$valid_wo = false;
		}
	}
	else{
		$valid_wo = false;
	}
}
else{
	$data = fake_wo_data();
}

function create_custom_dropdown($data, $_selected = null){
	$options = '';
	if($_selected!=''){
		foreach ($data as $d) {
			$options .= '<option value="'.$d['id'].'"';
			if($_selected==$d['id']){
				$options .= 'selected=selected';
			}
			$options .= '>'.$d['name'].'</option>';
		}
	}
	else{
		foreach ($data as $d) {
			$options .= '<option value="'.$d['id'].'" data-price="'.$d['month_price'].'">'.$d['machine_name'].'</option>';
		}
	}
	return $options;
}
?>
<section class="">
	<div class="container">
        <div class="row">
            <div class="col-md-12">
            	<div class="row space30">
                    <div class="col-md-6 col-sm-6">
                    	<?php
                    	if(isset($_GET['editwo'])){
                    		if($valid_wo){
                    	?>
                        	<h1 class="main_title"> Edit Work Order <?= $data['ampl_part_no'] ?></h1>
                        <?php
                    		}
                    		else{
                    	?>
                    		<h1 class="main_title"> Invalid Work Order</h1>
                    	<?php
                    		die();
                    		}
                    	}else{ ?>
                        <h1 class="main_title"> Add Work Order</h1>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="row col-md-12">
        <div class="col-md-12" >
            <ul class="nav nav-tabs" role="tablist" id="tabs">
                <li role="presentation" class="active"><a href="#original_work_order" aria-controls="original_work_order" role="tab" data-toggle="tab">Original</a></li>
                <li role="presentation"><a href="#past_req_wo" aria-controls="past_req_wo" role="tab" data-toggle="tab">PAST REQ WO</a></li>
            </ul>
        </div>
    </div>

<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="original_work_order">
	<form method="post" action="work_order.php">
		<?php if(isset($_GET['editwo'])){ ?>
		<input type="hidden" name="id" value="<?= $data['id'] ?>">
		<div class="col-md-12 row">
			<div class="col-md-2">
				<div class="form-group">
				<a href="work_order.php?revisedwo&id=<?= $data['id'] ?>" class="btn btn-default btn-fa">
			    	<button class="btn btn-default " id= "revised" name="" style="margin-left: 0;">Add Revised WO</button></a>
			    	
			    </div>
			</div>
		<?php } ?>
		
		</div>
		<div class="col-md-12 row">
			<div class="col-md-2">
				<div class="form-group">
			    	<label for="ampl_part_no">AMPL Part No:</label>
					<input type="text" class="form-control input-sm" id="ampl_part_no" name="ampl_part_no" placeholder="AMPL Part No" value="<?= $data['ampl_part_no'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="rod_size">Rod Size:</label>
					<input type="text" class="form-control input-sm" id="rod_size" name="rod_size" placeholder="Rod Size" value="<?= $data['rod_size'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="drawing_no">Drawing No:</label>
					<input type="text" class="form-control input-sm" id="drawing_no" name="drawing_no" placeholder="Drawing No" value="<?= $data['drawing_no'] ?>" />
			    </div>
			</div>
		</div>
		<div class="col-md-12 row">
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="basic_rate">Basic Rate:</label>
					<input type="text" class="form-control input-sm" id="basic_rate" name="basic_rate" placeholder="Basic Rate" value="<?= $data['basic_rate'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="job_charge">Job Charge:</label>
					<input type="text" class="form-control input-sm" id="job_charge" name="job_charge" placeholder="Job Charge" value="<?= $data['job_charge'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="size_premimum">Size Premium:</label>
					<input type="text" class="form-control input-sm" id="size_premimum" name="size_premimum" placeholder="Size Premium" value="<?= $data['size_premimum'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="loe">LOE:</label>
					<input type="text" class="form-control input-sm" id="loe" name="loe" placeholder="LOE" value="<?= $data['loe'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="holo">HOLO:</label>
					<input type="text" class="form-control input-sm" id="holo" name="holo" placeholder="HOLO" value="<?= $data['holo'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="twenty_per">2.20%:</label>
					<input type="text" class="form-control input-sm" id="twenty_per" name="twenty_per" placeholder="2.20%" value="<?= $data['twenty_per'] ?>" tabindex = "-1" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="rod_rate">Rod Rate:</label>
					<input type="text" class="form-control input-sm" id="rod_rate" name="rod_rate" placeholder="Rod Rate" value="<?= $data['rod_rate'] ?>" tabindex = "-1" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="chips_rate">Chips Rate:</label>
					<input type="text" class="form-control input-sm" id="chips_rate" name="chips_rate" placeholder="Chips Rate" value="<?= $data['chips_rate'] ?>" />
			    </div>
			</div>
		</div>
		<div class="col-md-12 row">
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="solid_wait">Solid Wait:</label>
					<input type="text" class="form-control input-sm" id="solid_wait" name="solid_wait" placeholder="Solid Wait" value="<?= $data['solid_wait'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="finish_wait">Finish Wait:</label>
					<input type="text" class="form-control input-sm" id="finish_wait" name="finish_wait" placeholder="Finish Wait" value="<?= $data['finish_wait'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="chips_wait">Chips Wait:</label>
					<input type="text" class="form-control input-sm" id="chips_wait" name="chips_wait" placeholder="Chips Wait" value="<?= $data['chips_wait'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="solid_amount">Solid Amount:</label>
					<input type="text" class="form-control input-sm" id="solid_amount" name="solid_amount" placeholder="Solid Amount" value="<?= $data['solid_amount'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="chips_reclaim">Chips Reclaim:</label>
					<input type="text" class="form-control input-sm" id="chips_reclaim" name="chips_reclaim" placeholder="Chips Reclaim" value="<?= $data['chips_reclaim'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="net_material_amount">Net Material Amount:</label>
					<input type="text" class="form-control input-sm" id="net_material_amount" name="net_material_amount" placeholder="Net Material Amount" value="<?= $data['net_material_amount'] ?>" />
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
				<input type="hidden" id='machine_id' name='machine_id' value = "<?= $data['machine_id'] ?>">
					<select id="machine_options" class="form-control" onchange='SetMachineValue();'>
					<option>-- Select Machine --</option>
						<?php
						print_r(create_custom_dropdown($machine_data));?>
					</select>
			    </div>
			</div>
		</div>
		<div class="col-md-12 row">
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="pallet_cycle_time">Pallet Cycle Time:</label>
					<input type="text" class="form-control input-sm" id="pallet_cycle_time" name="pallet_cycle_time" placeholder="Pallet Cycle Time" value="<?= $data['pallet_cycle_time'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="piece_per_pallete">Piece Per Pallete:</label>
					<input type="text" class="form-control input-sm" id="piece_per_pallete" name="piece_per_pallete" placeholder="Piece Per Pallete" value="<?= $data['piece_per_pallete'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="one_piece_cycle_time">One Piece Cycle Time:</label>
					<input type="text" class="form-control input-sm" id="one_piece_cycle_time" name="one_piece_cycle_time" placeholder="One piece Cycle Time" value="<?= $data['one_piece_cycle_time'] ?>" />
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
					<input type="text" class="form-control input-sm" id="time_of_mfg" name="time_of_mfg" placeholder="Time Of MFG" value="<?= $data['time_of_mfg'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="total_pcs">Total Pcs:</label>
					<input type="text" class="form-control input-sm" id="total_pcs" name="total_pcs" placeholder="Total Pcs" value="<?= $data['total_pcs'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="pcs_per_hour">Pcs Per Hour:</label>
					<input type="text" class="form-control input-sm" id="pcs_per_hour" name="pcs_per_hour" placeholder="Pcs Per Hour" value="<?= $data['pcs_per_hour'] ?>" />
			    </div>
			</div>
		</div>
		<div class="col-md-12 row">
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="per_days_hour">Per Days Hour:</label>
					<input type="text" class="form-control input-sm" id="per_days_hour" name="per_days_hour" placeholder="Per Days Hour" value="<?= $data['per_days_hour'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="pcs_per_23_hrs">Pcs Per 23 Hours:</label>
					<input type="text" class="form-control input-sm" id="pcs_per_23_hrs" name="pcs_per_23_hrs" placeholder="Pcs Per 23 Hours" value="<?= $data['pcs_per_23_hrs'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="month_per_day">Month Per Days:</label>
					<input type="text" class="form-control input-sm" id="month_per_day" name="month_per_day" placeholder="Month Per Days" value="<?= $data['month_per_day'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="total_pcs_25_days">Total Pcs 25 Days:</label>
					<input type="text" class="form-control input-sm" id="total_pcs_25_days" name="total_pcs_25_days" placeholder="Total Pcs 25 Days" value="<?= $data['total_pcs_25_days'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="cnc_exp_month">CNC EXP. Month:</label>
					<input type="text" class="form-control input-sm" id="cnc_exp_month" name="cnc_exp_month" placeholder="CNC EXP. Month" value="<?= $data['cnc_exp_month'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="per_pcs_labour">Per Pcs Labour:</label>
					<input type="text" class="form-control input-sm" id="per_pcs_labour" name="per_pcs_labour" placeholder="Per Pcs Labour" value="<?= $data['per_pcs_labour'] ?>" />
			    </div>
			</div>
		</div>
		<div class="col-md-12 row">
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="kg_per_hour">Kg Per Hour:</label>
					<input type="text" class="form-control input-sm" id="kg_per_hour" name="kg_per_hour" placeholder="Kg Per Hour" value="<?= $data['kg_per_hour'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="wait_per_100_pcs">Wait Per 100 Pcs:</label>
					<input type="text" class="form-control input-sm" id="wait_per_100_pcs" name="wait_per_100_pcs" placeholder="Wait Per 100 Pcs" value="<?= $data['wait_per_100_pcs'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="labour_per_kg">Labour Per Kg:</label>
					<input type="text" class="form-control input-sm" id="labour_per_kg" name="labour_per_kg" placeholder="Labour Per Kg" value="<?= $data['labour_per_kg'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="quentity">Quantity:</label>
					<input type="text" class="form-control input-sm" id="quentity" name="quentity" placeholder="Quantity" value="<?= $data['quentity'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="days">Days:</label>
					<input type="text" class="form-control input-sm" id="days" name="days" placeholder="Days" value="<?= $data['days'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="holidays">Holidays:</label>
					<input type="text" class="form-control input-sm" id="holidays" name="holidays" placeholder="Holidays" value="<?= $data['holidays'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="weekly_off">Weekly Off:</label>
					<input type="text" class="form-control input-sm" id="weekly_off" name="weekly_off" placeholder="Weekly Off" value="<?= $data['weekly_off'] ?>" />
			    </div>
			</div>
		</div>
		<div class="col-md-12 row">
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="start_date">Start Date:</label>
					<input type="text" class="form-control input-sm" id="start_date" name="start_date" placeholder="DD/MM/YYYY" value="<?= $data['start_date'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="end_date">End Date:</label>
					<input type="text" class="form-control input-sm" id="end_date" name="end_date" placeholder="DD/MM/YYYY" value="<?= $data['end_date'] ?>" />
			    </div>
			</div>
		</div>
		<!-- Part two over -->

		<!-- Part three start -->
		<div class="col-md-12 row">
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="cnc_production_count">CNC Production Pcs/Hour:</label>
					<input type="text" class="form-control input-sm" id="cnc_production_count" name="cnc_production_count" placeholder="CNC Production Pcs/Hour" value="<?= $data['cnc_production_count'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="labour_cost">Labour Cost:</label>
					<input type="text" class="form-control input-sm" id="labour_cost" name="labour_cost" placeholder="Labour Cost" value="<?= $data['labour_cost'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="machine_expense">Expense per Machine:</label>
					<input type="text" class="form-control input-sm" id="machine_expense" name="machine_expense" placeholder="Expense per Machine" value="<?= $data['machine_expense'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="total_labour">Total Labour:</label>
					<input type="text" class="form-control input-sm" id="total_labour" name="total_labour" placeholder="Total Labour" value="<?= $data['total_labour'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="pf_20_per">20% PF:</label>
					<input type="text" class="form-control input-sm" id="pf_20_per" name="pf_20_per" placeholder="20% PF" value="<?= $data['pf_20_per'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="total_labour_pf">Total Labour PF:</label>
					<input type="text" class="form-control input-sm" id="total_labour_pf" name="total_labour_pf" placeholder="Total Labour PF" value="<?= $data['total_labour_pf'] ?>" />
			    </div>
			</div>
		</div>
		<div class="col-md-12 row">
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="platting_kg">Plating Kg:</label>
					<input type="text" class="form-control input-sm" id="platting_kg" name="platting_kg" placeholder="Plating Kg" value="<?= $data['platting_kg'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="platting_amount">Plating Amount:</label>
					<input type="text" class="form-control input-sm" id="platting_amount" name="platting_amount" placeholder="Plating Amount" value="<?= $data['platting_amount'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="extra_charge">Extra Charge:</label>
					<input type="text" class="form-control input-sm" id="extra_charge" name="extra_charge" placeholder="Extra Charge" value="<?= $data['extra_charge'] ?>" />
			    </div>
			</div>
		</div>
		<div class="col-md-12 row">
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="material_vabour_cost" class="text-nowrap">Material + Labour Cost:</label>
					<input type="text" class="form-control input-sm" id="material_vabour_cost" name="material_vabour_cost" placeholder="Material + Labour Cost" value="<?= $data['material_vabour_cost'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="euro" class="text-nowrap">Euro:</label>
					<input type="text" class="form-control input-sm" id="euro" name="euro" placeholder="Euro" value="<?= $data['euro'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="final_inr" class="text-nowrap">Final INR:</label>
					<input type="text" class="form-control input-sm" id="final_inr" name="final_inr" placeholder="Final INR" value="<?= $data['final_inr'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="percentage" class="text-nowrap">%:</label>
					<input type="text" class="form-control input-sm" id="percentage" name="percentage" placeholder="Percentage" value="<?= $data['percentage'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="quentity" class="text-nowrap">Quentity:</label>
					<input type="text" class="form-control input-sm" id="quentity" name="quentity" placeholder="Quentity" value="<?= $data['quentity'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="rod_kg" class="text-nowrap">Rod Kg:</label>
					<input type="text" class="form-control input-sm" id="rod_kg" name="rod_kg" placeholder="Rod Kg" value="<?= $data['rod_kg'] ?>" />
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
					<!-- <input type="submit" class="form-control input-sm" id="submit" name="add" value="submit" /> -->
					<?php if(isset($_GET['editwo'])){ ?>
						<button class="btn btn-default btn-varient" name="editwo" style="margin-left: 0;">Save WO</button>
					<?php }else{ ?>
						<button class="btn btn-default btn-varient" name="addwo" style="margin-left: 0;">Save WO</button>
					<?php } ?>
			    </div>
			</div>
		</div>
	</form>
	</div>
</div>
</section>

</script><script src="js/jquery-3.2.0.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	if($('#machine_id').val() > 0)
	{
		$('#machine_options').val($('#machine_id').val());
	}

})
	function SetMachineValue()
	{
		var machineId = $('#machine_options option:selected').val();
		var monthPrice = $('#machine_options option:selected').attr('data-price');
		if(machineId > 0)
		{
			$('#machine_id').val(machineId);
		}else{
			$('#machine_id').val('');
		}
		if(monthPrice > 0)
		{
			$('#cnc_exp_month').val(monthPrice);
		}
		else
		{
			$('#cnc_exp_month').val('');
		}
	}
</script>