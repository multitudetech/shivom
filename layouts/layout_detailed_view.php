<?
$valid_wo = false;
if(is_numeric($_GET['id'])&&$_GET['id']>0){
	$_id = $_GET['id'];

	//check for revised or oreginal WO
	if(isset($_GET['revised'])){
		//revised WO data
		$revised_wo_data = get_revised_wo_detail_by_id($_id);
		$_data = get_revised_wo_items_detail_wo_id($_id);
		$check_revised_id = $revised_wo_data['work_order_id'];
		$oreginal_wo_id = $revised_wo_data['work_order_id'];
		$revised_wo_id = $_id;
		$_data_items = get_revised_items_list($_id);
	}
	else{
		//oreginal WO data
		$_data = get_wo_detail_by_id($_id);
		$check_revised_id = $_id;
		$oreginal_wo_id = $_id;
		$_data_items = get_items_list($_id);
	}

	if(count($_data)==0){
		$valid_wo = false;
	}
	else{
		$valid_wo = true;
		$revised_data = get_revised_wo_detail($check_revised_id);
	}
}

if($valid_wo){
?>
<section class="">
	<div class="container">
        <div class="row">
            <div class="col-md-12">
            	<div class="row space30">
                    <div class="col-md-6 col-sm-6">
                        	<h1 class="main_title"> View Work Order #<?= $_id ?></h1>
                    </div>
                    <div class="col-md-5"></div>
                    <div class="col-md-1">
                		<button type="button" class="btn btn-default" style="margin-left: 0;" data-toggle="modal" data-target="#myModal">Revised WO</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if(count($revised_data)>0){
    ?>
    <div class="row container">
    	<div class="col-md-12">
    		<a href="work_order.php?viewwo&id=<?= $oreginal_wo_id ?>" class="btn btn-default btn-varient" id="revised" style="margin-left: 0;">Original</a>
    		<?php
    		$count = 0;
    		foreach ($revised_data as $r_data) {
    		$count++;
    		?>
    		<a href="work_order.php?viewwo&revised&id=<?= $r_data['id'] ?>" class="btn btn-default <?= ($_id==$r_data['id']&&isset($_GET['revised']))? 'btn-varient' : '' ?>" id="revised" style="margin-left: 0;"><?= $r_data['audit_created_date'] ?></a>
    		<?
    		}
    		?>
    	</div>
    </div>
    <?
	}
    ?>
		<div class="col-md-12 row">
			<div class="col-md-10"></div>
			<div class="col-md-2">
				<a href="work_order.php?additem<?= (isset($_GET['revised'])?'&revised':'') ?>&id=<?= $_id ?>" class="btn btn-default btn-varient" id="revised" style="margin-left: 0;">Add Item</a>
			</div>
		</div>
		<? foreach($_data as $data){ ?>
		<div class="col-md-12 row">
			<div class="col-md-10"></div>
			<div class="col-md-2">
			    <a href="work_order.php?edititem<?= (isset($_GET['revised'])?'&revised':'') ?>&id=<?= $data['id'] ?>" class="btn btn-default " id="revised" style="margin-left: 0;">Edit Item</a>
			</div>
		</div>
		<div class="col-md-12 row">
			<div class="col-md-2">
				<div class="form-group">
			    	<label for="ampl_part_no">AMPL Part No: </label>
			    	<p><?= $data['ampl_part_no'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="rod_size">Rod Size:</label>
					<p><?= $data['rod_size'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="drawing_no">Drawing No:</label>
					<p><?= $data['drawing_no'] ?></p>
			    </div>
			</div>
		</div>
		<div class="col-md-12 row">
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="basic_rate">Basic Rate:</label>
					<p><?= $data['basic_rate'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="job_charge">Job Charge:</label>
					<p><?= $data['job_charge'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="size_premimum">Size Premium:</label>
					<p><?= $data['size_premimum'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="loe">LOE:</label>
					<p><?= $data['loe'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="holo">HOLO:</label>
					<p><?= $data['holo'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="twenty_per">2.20%:</label>
					<p><?= $data['twenty_per'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="rod_rate">Rod Rate:</label>
					<p><?= $data['rod_rate'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="chips_rate">Chips Rate:</label>
					<p><?= $data['chips_rate'] ?></p>
			    </div>
			</div>
		</div>
		<div class="col-md-12 row">
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="solid_wait">Solid Wait:</label>
					<p><?= $data['solid_wait'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="finish_wait">Finish Wait:</label>
					<p><?= $data['finish_wait'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="chips_wait">Chips Wait:</label>
					<p><?= $data['chips_wait'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="solid_amount">Solid Amount:</label>
					<p><?= $data['solid_amount'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="chips_reclaim">Chips Reclaim:</label>
					<p><?= $data['chips_reclaim'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="net_material_amount">Net Material Amount:</label>
					<p><?= $data['net_material_amount'] ?></p>
			    </div>
			</div>
		</div>
		<!-- Part one over -->

		<!-- Part two start -->
		<div class="col-md-12 row">
			<div class="col-md-12">
				<label>Machine Details:</label>
				<p><?= get_machine_name($data['machine_id']) ?></p>
			</div>
		</div>
		<div class="col-md-12 row">
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="pallet_cycle_time">Pallet Cycle Time:</label>
					<p><?= $data['pallet_cycle_time'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="piece_per_pallete">Piece Per Pallete:</label>
					<p><?= $data['piece_per_pallete'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="one_piece_cycle_time">One Piece Cycle Time:</label>
					<p><?= $data['one_piece_cycle_time'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="time_of_mfg">Time Of MFG:</label>
					<p><?= $data['time_of_mfg'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="total_pcs">Total Pcs:</label>
					<p><?= $data['total_pcs'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="pcs_per_hour">Pcs Per Hour:</label>
					<p><?= $data['pcs_per_hour'] ?></p>
			    </div>
			</div>
		</div>
		<div class="col-md-12 row">
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="per_days_hour">Per Days Hour:</label>
					<p><?= $data['per_days_hour'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="pcs_per_23_hrs">Pcs Per 23 Hours:</label>
					<p><?= $data['pcs_per_23_hrs'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="month_per_day">Month Per Days:</label>
					<p><?= $data['month_per_day'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="total_pcs_25_days">Total Pcs 25 Days:</label>
					<p><?= $data['total_pcs_25_days'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="cnc_exp_month">CNC EXP. Month:</label>
					<p><?= $data['cnc_exp_month'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="per_pcs_labour">Per Pcs Labour:</label>
					<p><?= $data['per_pcs_labour'] ?></p>
			    </div>
			</div>
		</div>
		<div class="col-md-12 row">
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="kg_per_hour">Kg Per Hour:</label>
					<p><?= $data['kg_per_hour'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="wait_per_100_pcs">Wait Per 100 Pcs:</label>
					<p><?= $data['wait_per_100_pcs'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="labour_per_kg">Labour Per Kg:</label>
					<p><?= $data['labour_per_kg'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="quentity">Quantity:</label>
					<p><?= $data['quentity'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="days">Days:</label>
					<p><?= $data['days'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="holidays">Holidays:</label>
					<p><?= $data['holidays'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="weekly_off">Weekly Off:</label>
					<p><?= $data['weekly_off'] ?></p>
			    </div>
			</div>
		</div>
		<div class="col-md-12 row">
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="start_date">Start Date:</label>
					<p><?= $data['start_date'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="end_date">End Date:</label>
					<p><?= $data['end_date'] ?></p>
			    </div>
			</div>
		</div>
		<!-- Part two over -->

		<!-- Part three start -->
		<div class="col-md-12 row">
			<div class="col-md-2">
			    <div class="form-group">
			    	<label class="text-nowrap" for="cnc_production_count">CNC Production Pcs/Hour:</label>
					<p><?= $data['cnc_production_count'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="labour_cost">Labour Cost:</label>
					<p><?= $data['labour_cost'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="machine_expense">Expense per Machine:</label>
					<p><?= $data['machine_expense'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="total_labour">Total Labour:</label>
					<p><?= $data['total_labour'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="pf_20_per">20% PF:</label>
					<p><?= $data['pf_20_per'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="total_labour_pf">Total Labour PF:</label>
					<p><?= $data['total_labour_pf'] ?></p>
			    </div>
			</div>
		</div>
		<div class="col-md-12 row">
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="platting_kg">Plating Kg:</label>
					<p><?= $data['platting_kg'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="platting_amount">Plating Amount:</label>
					<p><?= $data['platting_amount'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="extra_charge">Extra Charge:</label>
					<p><?= $data['extra_charge'] ?></p>
			    </div>
			</div>
		</div>
		<div class="col-md-12 row">
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="material_vabour_cost" class="text-nowrap">Material + Labour Cost:</label>
					<p><?= $data['material_vabour_cost'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="euro" class="text-nowrap">Euro:</label>
					<p><?= $data['euro'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="final_inr" class="text-nowrap">Final INR:</label>
					<p><?= $data['final_inr'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="percentage" class="text-nowrap">%:</label>
					<p><?= $data['percentage'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="quentity" class="text-nowrap">Quentity:</label>
					<p><?= $data['quentity'] ?></p>
			    </div>
			</div>
			<div class="col-md-2">
			    <div class="form-group">
			    	<label for="rod_kg" class="text-nowrap">Rod Kg:</label>
					<p><?= $data['rod_kg'] ?></p>
			    </div>
			</div>
		</div>
		<? } ?>
	</div>
</section>
<?
}
else{
echo "Invalid WO";
}
?>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">WO Items</h4>
      </div>
      <form method="post" action="work_order.php">
      <div class="modal-body">
    	<div class="col-md-12">
    		<input type="hidden" name="oreginal" value="<?= (isset($_GET['revised'])? 'false' : 'true') ?>">
    		<input type="hidden" name="wo_id" value="<?= $oreginal_wo_id ?>">
    		<? if(isset($_GET['revised'])){ ?>
    		<input type="hidden" name="revised_wo_id" value="<?= $revised_wo_id ?>">
    		<? } ?>
    		<div class="form-group">
    			<? foreach($_data_items as $data_items){ ?>
	        	<div class="checkbox">
				    <input type="checkbox" class="form-group" name="item_ids[]" value="<?= $data_items['id'] ?>"> <?= $data_items['ampl_part_no'] ?> (<?= $data_items['drawing_no'] ?>)
	        	</div>
	        	<? } ?>
	        </div>
    	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="revised" class="btn btn-primary">Revise</button>
      </div>
  	  </form>
    </div>
  </div>
</div>