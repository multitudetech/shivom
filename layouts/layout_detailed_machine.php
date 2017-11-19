<?php
$valid_wo = true;
if(isset($_GET['editmachine'])){
	if(is_numeric($_GET['id'])&&$_GET['id']>0){
		$_id = $_GET['id'];
		$data = get_machine_detail_by_id($_id);
		if(count($data)==0){
			$valid_machine = false;
		}
	}
	else{
		$valid_machine = false;
	}
}
else{
	$data = fake_machine_data();
}
?>
<section class="">
	<div class="container">
        <div class="row">
            <div class="col-md-12">
            	<div class="row space30">
                    <div class="col-md-6 col-sm-6">
                    	<?php
                    	if(isset($_GET['editmachine'])){
                    		if($valid_wo){
                    	?>
                        	<h1 class="main_title"> Edit Machine <?= $data['machine_name'] ?></h1>
                        <?php
                    		}
                    		else{
                    	?>
                    		<h1 class="main_title">Invalid Machine</h1>
                    	<?php
                    		die();
                    		}
                    	}else{ ?>
                        <h1 class="main_title"> Add Machine</h1>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form method="post" action="machine.php">
    <?php if(isset($_GET['editmachine'])){ ?>
	<input type="hidden" name="id" value="<?= $data['id'] ?>">
	<?php } ?>
	<div class="col-md-12 row">
		<div class="col-md-2">
			<div class="form-group">
		    	<label for="machine_name">Machine Name:</label>
				<input type="text" class="form-control input-sm" id="machine_name" name="machine_name" placeholder="Machine Name" value="<?= $data['machine_name'] ?>" />
		    </div>
		</div>
		<div class="col-md-2">
		    <div class="form-group">
		    	<label for="month_price">Monthly Price:</label>
				<input type="text" class="form-control input-sm" id="month_price" name="month_price" placeholder="Monthly Price" value="<?= $data['month_price'] ?>" />
		    </div>
		</div>
		
	</div>
	<div class="col-md-12 row">
	<div class="col-md-2">
		    <div class="form-group">
				<?php if(isset($_GET['editmachine'])){ ?>
					<button class="btn btn-default btn-varient" name="editmachine" style="margin-left: 0;">Save Machine</button>
				<?php }else{ ?>
					<button class="btn btn-default btn-varient" name="addmachine" style="margin-left: 0;">Save Machine</button>
				<?php } ?>
		    </div>
		</div>
		</div>
    </form>
    </section>
