//custom js file

//auto date fillup on load script start
if(!($("#date").length==0)){
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
}
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

//calculate price function start
function calculate_price(){
	var rod_rate = $('#rod_rate').val();
	var chips_rate = $('#chips_rate').val();
	var labour_cost = $('#labour_cost').val();
	var assembly_cost = $('#assembly_cost').val();
	var processing_cost = $('#processing_cost').val();
	var plating_cost = $('#plating_cost').val();
	var debarring_cost = $('#debarring_cost').val();
	var other_cost_1 = $('#other_cost_1').val();
	var other_cost_2 = $('#other_cost_2').val();
	var other_cost_3 = $('#other_cost_3').val();
	
	//calculate cost
	var final_cost = +rod_rate + +chips_rate + +labour_cost + +assembly_cost + +processing_cost + +plating_cost + +debarring_cost + +other_cost_1 + +other_cost_2 + +other_cost_3;

	//apply cost
	$('#final_cost').val(final_cost);
}
//calculate price function end

//autofill description and drawing name start
$("#drawing_no").change(function(){
	var drawing_id = $('#drawing_no').val();
    $.ajax({
    	type: "GET",
    	url: "fetch.php?drawing_id="+drawing_id,
    	dataType: "json",
    	success: function (data){
    		if(data['customer_drawing_no']!='undefined'){
    			$('#customer_drawing_no').val(data['customer_drawing_no']);
    		}
    		if(data['description']!='undefined'){
    			$('#description').val(data['description']);
    		}
    	}
    });
});
//autofill description and drawing name end


//scripts for inward page start

//autofill Actual pcs start
$("#kg").keyup(function(){
	var kg = $('#kg').val();
	var per_100_wt = $('#per_100_wt').val();
	var pcs = (100*kg)/per_100_wt;
	$('#pcs').val(pcs);
});

$("#per_100_wt").keyup(function(){
	//calculate pcs
	var kg = $('#kg').val();
	var per_100_wt = $('#per_100_wt').val();
	var pcs = (100*kg)/per_100_wt;
	$('#pcs').val(pcs);

	//calculate rejection pcs
	var rejection_kg = $('#rejection_kg').val();
	var per_100_wt = $('#per_100_wt').val();
	var rejection_pcs = (100*rejection_kg)/per_100_wt;
	$('#rejection_pcs').val(rejection_pcs);
});
//autofill Actual pcs end

//autofill Rejection Pcs start
$('#rejection_kg').keyup(function(){
	var rejection_kg = $('#rejection_kg').val();
	var per_100_wt = $('#per_100_wt').val();
	var rejection_pcs = (100*rejection_kg)/per_100_wt;
	$('#rejection_pcs').val(rejection_pcs);
});
//autofill Rejection Pcs end

//calculate ok pcs start
$('#per_100_wt').keyup(function(){
	var rejection_pcs = $('#rejection_pcs').val();
	var pcs = $('#pcs').val();
	var ok_pcs = pcs-rejection_pcs;
	$('#ok_pcs').val(ok_pcs);
});

$('#rejection_kg').keyup(function(){
	var rejection_pcs = $('#rejection_pcs').val();
	var pcs = $('#pcs').val();
	var ok_pcs = pcs-rejection_pcs;
	$('#ok_pcs').val(ok_pcs);
});

$('#kg').keyup(function(){
	var rejection_pcs = $('#rejection_pcs').val();
	var pcs = $('#pcs').val();
	var ok_pcs = pcs-rejection_pcs;
	$('#ok_pcs').val(ok_pcs);
});
//calculate ok pcs end

//scripts for inward page end


//script for cost calculation sheet start

//calculate rod rate start
$('#twenty_per').keyup(function(){
	var twenty_per = $('#twenty_per').val();
	var rod_rate = +twenty_per + +(twenty_per*2.2/100);
	$('#rod_rate').val(rod_rate);

	var rod_rate = $('#rod_rate').val();
	var solid_wait = $('#solid_wait').val();
	var solid_amount = rod_rate*solid_wait;
	$('#solid_amount').val(solid_amount.toFixed(3));

	var solid_amount = $('#solid_amount').val();
	var chips_reclaim = $('#chips_reclaim').val();
	var net_material_amount = solid_amount-chips_reclaim;
	$('#net_material_amount').val(net_material_amount.toFixed(3));
});
//calculate rod rate end

//calculate chips wait start
$('#solid_wait').keyup(function(){
	var solid_wait = $('#solid_wait').val();
	var finish_wait = $('#finish_wait').val();
	var chips_wait = solid_wait-finish_wait;
	$('#chips_wait').val(chips_wait);
});

$('#finish_wait').keyup(function(){
	var solid_wait = $('#solid_wait').val();
	var finish_wait = $('#finish_wait').val();
	var chips_wait = solid_wait-finish_wait;
	$('#chips_wait').val(chips_wait.toFixed(3));

	var chips_rate = $('#chips_rate').val();
	var chips_wait = $('#chips_wait').val();
	var chips_reclaim = chips_rate*chips_wait;
	$('#chips_reclaim').val(chips_reclaim.toFixed(3));

	var solid_amount = $('#solid_amount').val();
	var chips_reclaim = $('#chips_reclaim').val();
	var net_material_amount = solid_amount-chips_reclaim;
	$('#net_material_amount').val(net_material_amount.toFixed(3));
});
//calculate chips wait end

//autofill solid amount start

$('#solid_wait').keyup(function(){
	var rod_rate = $('#rod_rate').val();
	var solid_wait = $('#solid_wait').val();
	var solid_amount = rod_rate*solid_wait;
	$('#solid_amount').val(solid_amount.toFixed(3));

	var chips_rate = $('#chips_rate').val();
	var chips_wait = $('#chips_wait').val();
	var chips_reclaim = chips_rate*chips_wait;
	$('#chips_reclaim').val(chips_reclaim.toFixed(3));

	var solid_amount = $('#solid_amount').val();
	var chips_reclaim = $('#chips_reclaim').val();
	var net_material_amount = solid_amount-chips_reclaim;
	$('#net_material_amount').val(net_material_amount.toFixed(3));
});
//autofill solid amount end

//autofill chips reclaim start
$('#chips_rate').keyup(function(){
	var chips_rate = $('#chips_rate').val();
	var chips_wait = $('#chips_wait').val();
	var chips_reclaim = chips_rate*chips_wait;
	$('#chips_reclaim').val(chips_reclaim.toFixed(3));

	var solid_amount = $('#solid_amount').val();
	var chips_reclaim = $('#chips_reclaim').val();
	var net_material_amount = solid_amount-chips_reclaim;
	$('#net_material_amount').val(net_material_amount.toFixed(3));
});
//autofill chips reclaim end

//autofill one piece cycle time start
$('#pallet_cycle_time').keyup(function(){
	var pallet_cycle_time = $('#pallet_cycle_time').val();
	var piece_per_pallete = $('#piece_per_pallete').val();
	var one_piece_cycle_time = pallet_cycle_time/piece_per_pallete;
	$('#one_piece_cycle_time').val(one_piece_cycle_time.toFixed(3));

	var one_piece_cycle_time = $('#one_piece_cycle_time').val();
	var time_of_mfg = $('#time_of_mfg').val();
	var total_pcs = (time_of_mfg*3600)/one_piece_cycle_time;
	$('#total_pcs').val(total_pcs.toFixed(3));

	var time_of_mfg = $('#time_of_mfg').val();
	var total_pcs = $('#total_pcs').val();
	var pcs_per_hour = total_pcs/time_of_mfg;
	$('#pcs_per_hour').val(pcs_per_hour.toFixed(3));

	var pcs_per_hour = $('#pcs_per_hour').val();
	var per_days_hour = $('#per_days_hour').val();
	var pcs_per_23_hrs = pcs_per_hour*per_days_hour;
	$('#pcs_per_23_hrs').val(pcs_per_23_hrs.toFixed(0));

	var month_per_day = $('#month_per_day').val();
	var pcs_per_23_hrs = $('#pcs_per_23_hrs').val();
	var total_pcs_25_days = month_per_day*pcs_per_23_hrs;
	$('#total_pcs_25_days').val(total_pcs_25_days.toFixed(3));

	var cnc_exp_month = $('#cnc_exp_month').val();
	var total_pcs_25_days = $('#total_pcs_25_days').val();
	var per_pcs_labour = cnc_exp_month/total_pcs_25_days;
	$('#per_pcs_labour').val(per_pcs_labour.toFixed(3));

	var per_pcs_labour = $('#per_pcs_labour').val();
	var pcs_per_hour = $('#pcs_per_hour').val();
	var kg_per_hour = per_pcs_labour*pcs_per_hour;
	$('#kg_per_hour').val(kg_per_hour.toFixed(3));
});

$('#piece_per_pallete').keyup(function(){
	var pallet_cycle_time = $('#pallet_cycle_time').val();
	var piece_per_pallete = $('#piece_per_pallete').val();
	var one_piece_cycle_time = pallet_cycle_time/piece_per_pallete;
	$('#one_piece_cycle_time').val(one_piece_cycle_time.toFixed(3));

	var one_piece_cycle_time = $('#one_piece_cycle_time').val();
	var time_of_mfg = $('#time_of_mfg').val();
	var total_pcs = (time_of_mfg*3600)/one_piece_cycle_time;
	$('#total_pcs').val(total_pcs.toFixed(3));

	var time_of_mfg = $('#time_of_mfg').val();
	var total_pcs = $('#total_pcs').val();
	var pcs_per_hour = total_pcs/time_of_mfg;
	$('#pcs_per_hour').val(pcs_per_hour.toFixed(3));

	var pcs_per_hour = $('#pcs_per_hour').val();
	var per_days_hour = $('#per_days_hour').val();
	var pcs_per_23_hrs = pcs_per_hour*per_days_hour;
	$('#pcs_per_23_hrs').val(pcs_per_23_hrs.toFixed(0));

	var month_per_day = $('#month_per_day').val();
	var pcs_per_23_hrs = $('#pcs_per_23_hrs').val();
	var total_pcs_25_days = month_per_day*pcs_per_23_hrs;
	$('#total_pcs_25_days').val(total_pcs_25_days.toFixed(3));

	var cnc_exp_month = $('#cnc_exp_month').val();
	var total_pcs_25_days = $('#total_pcs_25_days').val();
	var per_pcs_labour = cnc_exp_month/total_pcs_25_days;
	$('#per_pcs_labour').val(per_pcs_labour.toFixed(3));

	var per_pcs_labour = $('#per_pcs_labour').val();
	var pcs_per_hour = $('#pcs_per_hour').val();
	var kg_per_hour = per_pcs_labour*pcs_per_hour;
	$('#kg_per_hour').val(kg_per_hour.toFixed(3));
});
//autofill one piece cycle time end

//auto fill total pcs start
$('#time_of_mfg').keyup(function(){
	var one_piece_cycle_time = $('#one_piece_cycle_time').val();
	var time_of_mfg = $('#time_of_mfg').val();
	var total_pcs = (time_of_mfg*3600)/one_piece_cycle_time;
	$('#total_pcs').val(total_pcs.toFixed(3));

	var time_of_mfg = $('#time_of_mfg').val();
	var total_pcs = $('#total_pcs').val();
	var pcs_per_hour = total_pcs/time_of_mfg;
	$('#pcs_per_hour').val(pcs_per_hour.toFixed(3));

	var pcs_per_hour = $('#pcs_per_hour').val();
	var per_days_hour = $('#per_days_hour').val();
	var pcs_per_23_hrs = pcs_per_hour*per_days_hour;
	$('#pcs_per_23_hrs').val(pcs_per_23_hrs.toFixed(0));

	var month_per_day = $('#month_per_day').val();
	var pcs_per_23_hrs = $('#pcs_per_23_hrs').val();
	var total_pcs_25_days = month_per_day*pcs_per_23_hrs;
	$('#total_pcs_25_days').val(total_pcs_25_days.toFixed(3));

	var cnc_exp_month = $('#cnc_exp_month').val();
	var total_pcs_25_days = $('#total_pcs_25_days').val();
	var per_pcs_labour = cnc_exp_month/total_pcs_25_days;
	$('#per_pcs_labour').val(per_pcs_labour.toFixed(3));

	var per_pcs_labour = $('#per_pcs_labour').val();
	var pcs_per_hour = $('#pcs_per_hour').val();
	var kg_per_hour = per_pcs_labour*pcs_per_hour;
	$('#kg_per_hour').val(kg_per_hour.toFixed(3));
});
//auto fill total pcs end

//auto fill pcs per hour start
$('#time_of_mfg').keyup(function(){
	var time_of_mfg = $('#time_of_mfg').val();
	var total_pcs = $('#total_pcs').val();
	var pcs_per_hour = total_pcs/time_of_mfg;
	$('#pcs_per_hour').val(pcs_per_hour.toFixed(3));

	var pcs_per_hour = $('#pcs_per_hour').val();
	var per_days_hour = $('#per_days_hour').val();
	var pcs_per_23_hrs = pcs_per_hour*per_days_hour;
	$('#pcs_per_23_hrs').val(pcs_per_23_hrs.toFixed(0));

	var month_per_day = $('#month_per_day').val();
	var pcs_per_23_hrs = $('#pcs_per_23_hrs').val();
	var total_pcs_25_days = month_per_day*pcs_per_23_hrs;
	$('#total_pcs_25_days').val(total_pcs_25_days.toFixed(3));

	var cnc_exp_month = $('#cnc_exp_month').val();
	var total_pcs_25_days = $('#total_pcs_25_days').val();
	var per_pcs_labour = cnc_exp_month/total_pcs_25_days;
	$('#per_pcs_labour').val(per_pcs_labour.toFixed(3));

	var per_pcs_labour = $('#per_pcs_labour').val();
	var pcs_per_hour = $('#pcs_per_hour').val();
	var kg_per_hour = per_pcs_labour*pcs_per_hour;
	$('#kg_per_hour').val(kg_per_hour.toFixed(3));
});
//auto fill pcs per hour end

//auto fill pcs per 23 hour start
$('#per_days_hour').keyup(function(){
	var pcs_per_hour = $('#pcs_per_hour').val();
	var per_days_hour = $('#per_days_hour').val();
	var pcs_per_23_hrs = pcs_per_hour*per_days_hour;
	$('#pcs_per_23_hrs').val(pcs_per_23_hrs.toFixed(0));

	var month_per_day = $('#month_per_day').val();
	var pcs_per_23_hrs = $('#pcs_per_23_hrs').val();
	var total_pcs_25_days = month_per_day*pcs_per_23_hrs;
	$('#total_pcs_25_days').val(total_pcs_25_days.toFixed(3));

	var cnc_exp_month = $('#cnc_exp_month').val();
	var total_pcs_25_days = $('#total_pcs_25_days').val();
	var per_pcs_labour = cnc_exp_month/total_pcs_25_days;
	$('#per_pcs_labour').val(per_pcs_labour.toFixed(3));

	var per_pcs_labour = $('#per_pcs_labour').val();
	var pcs_per_hour = $('#pcs_per_hour').val();
	var kg_per_hour = per_pcs_labour*pcs_per_hour;
	$('#kg_per_hour').val(kg_per_hour.toFixed(3));
});
//auto fill pcs per 23 hour end

//auto fill total pcs per 25 days start
$('#month_per_day').keyup(function(){
	var month_per_day = $('#month_per_day').val();
	var pcs_per_23_hrs = $('#pcs_per_23_hrs').val();
	var total_pcs_25_days = month_per_day*pcs_per_23_hrs;
	$('#total_pcs_25_days').val(total_pcs_25_days.toFixed(3));

	var cnc_exp_month = $('#cnc_exp_month').val();
	var total_pcs_25_days = $('#total_pcs_25_days').val();
	var per_pcs_labour = cnc_exp_month/total_pcs_25_days;
	$('#per_pcs_labour').val(per_pcs_labour.toFixed(3));

	var per_pcs_labour = $('#per_pcs_labour').val();
	var pcs_per_hour = $('#pcs_per_hour').val();
	var kg_per_hour = per_pcs_labour*pcs_per_hour;
	$('#kg_per_hour').val(kg_per_hour.toFixed(3));
});
//auto fill total pcs per 25 days end

//auto fill per pcs labour start
$('#cnc_exp_month').keyup(function(){
	var cnc_exp_month = $('#cnc_exp_month').val();
	var total_pcs_25_days = $('#total_pcs_25_days').val();
	var per_pcs_labour = cnc_exp_month/total_pcs_25_days;
	$('#per_pcs_labour').val(per_pcs_labour.toFixed(3));

	var per_pcs_labour = $('#per_pcs_labour').val();
	var pcs_per_hour = $('#pcs_per_hour').val();
	var kg_per_hour = per_pcs_labour*pcs_per_hour;
	$('#kg_per_hour').val(kg_per_hour.toFixed(3));
});
//auto fill per pcs labour end

//auto fill kg per hour start
$('#cnc_exp_month').keyup(function(){
	var per_pcs_labour = $('#per_pcs_labour').val();
	var pcs_per_hour = $('#pcs_per_hour').val();
	var kg_per_hour = per_pcs_labour*pcs_per_hour;
	$('#kg_per_hour').val(kg_per_hour.toFixed(3));
});
//auto fill kg per hour end

//add dependency for one peace cycle time start
$('#one_piece_cycle_time').keyup(function(){
	var one_piece_cycle_time = $('#one_piece_cycle_time').val();
	var time_of_mfg = $('#time_of_mfg').val();
	var total_pcs = (time_of_mfg*3600)/one_piece_cycle_time;
	$('#total_pcs').val(total_pcs.toFixed(3));
});
//add dependency for one peace cycle time end
//script for cost calculation sheet end