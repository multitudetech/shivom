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

$('#basic_rate').keyup(function(){
	calculate_twenty_per();

	calculate_rod_rate();
});

$('#job_charge').keyup(function(){
	calculate_twenty_per();

	calculate_rod_rate();

	
});

$('#size_premimum').keyup(function(){
	calculate_twenty_per();

	calculate_rod_rate();
});

$('#loe').keyup(function(){
	calculate_twenty_per();

	calculate_rod_rate();
});

$('#holo').keyup(function(){
	calculate_twenty_per();

	calculate_rod_rate();
});

$('#twenty_per').keyup(function(){
	calculate_rod_rate();
});

$('#solid_wait').keyup(function(){
	calculate_chips_wait();

	calculate_solid_amount();

	calculate_chips_reclaim();

	calculate_net_material_amount();

	calculate_material_vabour_cost();
});

$('#finish_wait').keyup(function(){
	calculate_chips_wait();

	calculate_chips_reclaim();

	calculate_net_material_amount();

	calculate_wait_per_100_pcs();

	calculate_labour_per_kg();

	calculate_labour_cost();

	calculate_platting_amount();

	calculate_material_vabour_cost();
});

$('#rod_rate').keyup(function(){
	calculate_solid_amount();

	calculate_net_material_amount();

	calculate_material_vabour_cost();
});

$('#chips_rate').keyup(function(){
	calculate_chips_reclaim();

	calculate_net_material_amount();

	calculate_material_vabour_cost();
});

$('#pallet_cycle_time').keyup(function(){
	calculate_one_piece_cycle_time();

	calculate_total_pcs();

	calculate_pcs_per_hour();

	calculate_pcs_per_23_hrs();

	calculate_total_pcs_25_days();

	calculate_per_pcs_labour();

	calculate_kg_per_hour();

	calculate_labour_per_kg();

	calculate_days();

	calculate_cnc_production_count();

	calculate_labour_cost();

	calculate_total_labour();

	calculate_pf_20_per();

	calculate_total_labour_pf();

	calculate_material_vabour_cost();
});

$('#piece_per_pallete').keyup(function(){
	calculate_one_piece_cycle_time();

	calculate_total_pcs();

	calculate_pcs_per_hour();

	calculate_pcs_per_23_hrs();

	calculate_total_pcs_25_days();

	calculate_per_pcs_labour();

	calculate_kg_per_hour();

	calculate_labour_per_kg();

	calculate_days();

	calculate_cnc_production_count();

	calculate_labour_cost();

	calculate_total_labour();

	calculate_pf_20_per();

	calculate_total_labour_pf();

	calculate_material_vabour_cost();
});

$('#time_of_mfg').keyup(function(){
	calculate_total_pcs();

	calculate_pcs_per_hour();

	calculate_pcs_per_23_hrs();

	calculate_total_pcs_25_days();

	calculate_per_pcs_labour();

	calculate_kg_per_hour();

	calculate_labour_per_kg();

	calculate_days();

	calculate_cnc_production_count();

	calculate_labour_cost();

	calculate_total_labour();

	calculate_pf_20_per();

	calculate_total_labour_pf();

	calculate_material_vabour_cost();
});

$('#per_days_hour').keyup(function(){
	calculate_pcs_per_23_hrs();

	calculate_total_pcs_25_days();

	calculate_per_pcs_labour();

	calculate_kg_per_hour();

	calculate_labour_per_kg();

	calculate_days();

	calculate_labour_cost();

	calculate_total_labour();

	calculate_pf_20_per();

	calculate_total_labour_pf();

	calculate_material_vabour_cost();
});

$('#month_per_day').keyup(function(){
	calculate_total_pcs_25_days();

	calculate_per_pcs_labour();

	calculate_kg_per_hour();

	calculate_labour_per_kg();

	calculate_labour_cost();

	calculate_total_labour();

	calculate_pf_20_per();

	calculate_total_labour_pf();

	calculate_material_vabour_cost();
});

$('#cnc_exp_month').keyup(function(){
	calculate_per_pcs_labour();

	calculate_kg_per_hour();

	calculate_labour_per_kg();

	calculate_labour_cost();

	calculate_machine_expense();

	calculate_total_labour();

	calculate_pf_20_per();

	calculate_total_labour_pf();

	calculate_material_vabour_cost();
});

$('#quentity').keyup(function(){
	calculate_days();

	calculate_end_date();
});

$('#holidays').keyup(function(){
	calculate_end_date();
});

$('#weekly_off').keyup(function(){
	calculate_end_date();
});

$('#start_date').keyup(function(){
	calculate_end_date();
});

$('#platting_kg').keyup(function(){
	calculate_platting_amount();
});

$('#platting_amount').keyup(function(){
	calculate_material_vabour_cost();
});

$('#extra_charge').keyup(function(){
	calculate_material_vabour_cost();
});


function calculate_rod_rate(){
	//calculate rod rate
	var twenty_per = $('#twenty_per').val();
	var rod_rate = twenty_per*2.2/100 + +twenty_per;
	$('#rod_rate').val(rod_rate);
}

function calculate_twenty_per(){
	//calculate 2.20%
	var basic_rate = $('#basic_rate').val();
	var job_charge = $('#job_charge').val();
	var size_premimum = $('#size_premimum').val();
	var loe = $('#loe').val();
	var holo = $('#holo').val();
	var twenty_per = + basic_rate + +job_charge + +size_premimum + +loe + +holo;
	$('#twenty_per').val(twenty_per);
}

function calculate_chips_wait(){
	//calculate chips wait
	var solid_wait = $('#solid_wait').val();
	var finish_wait = $('#finish_wait').val();
	var chips_wait = solid_wait - finish_wait;
	$('#chips_wait').val(chips_wait.toFixed(3));
}

function calculate_solid_amount(){
	//calculate solid amount
	var twenty_per = $('#twenty_per').val();
	var rod_rate = twenty_per*2.2/100 + +twenty_per;

	var solid_wait = $('#solid_wait').val();
	var solid_amount = solid_wait * rod_rate;
	$('#solid_amount').val(solid_amount.toFixed(3));
}

function calculate_chips_reclaim(){
	var chips_rate = $('#chips_rate').val();

	var solid_wait = $('#solid_wait').val();
	var finish_wait = $('#finish_wait').val();
	var chips_wait = solid_wait - finish_wait;

	var chips_reclaim = chips_rate * chips_wait;
	$('#chips_reclaim').val(chips_reclaim.toFixed(3));
}

function calculate_net_material_amount(){
	//chips reclaim
	var chips_rate = $('#chips_rate').val();

	var solid_wait = $('#solid_wait').val();
	var finish_wait = $('#finish_wait').val();
	var chips_wait = solid_wait - finish_wait;

	var chips_reclaim = chips_rate * chips_wait;

	//solid amount
	var twenty_per = $('#twenty_per').val();
	var rod_rate = twenty_per*2.2/100 + +twenty_per;

	var solid_wait = $('#solid_wait').val();
	var solid_amount = solid_wait * rod_rate;


	var net_material_amount = solid_amount - chips_reclaim;
	$('#net_material_amount').val(net_material_amount.toFixed(2));
}

function calculate_one_piece_cycle_time(){
	var pallet_cycle_time = $('#pallet_cycle_time').val();
	var piece_per_pallete = $('#piece_per_pallete').val();
	var one_piece_cycle_time = pallet_cycle_time/piece_per_pallete;
	$('#one_piece_cycle_time').val(one_piece_cycle_time);
}

function calculate_total_pcs(){
	var pallet_cycle_time = $('#pallet_cycle_time').val();
	var piece_per_pallete = $('#piece_per_pallete').val();
	var one_piece_cycle_time = pallet_cycle_time/piece_per_pallete;

	var time_of_mfg = $('#time_of_mfg').val();

	var total_pcs = time_of_mfg*3600/one_piece_cycle_time;
	$('#total_pcs').val(total_pcs.toFixed(0));
}

function calculate_pcs_per_hour(){
	var time_of_mfg = $('#time_of_mfg').val();

	var pallet_cycle_time = $('#pallet_cycle_time').val();
	var piece_per_pallete = $('#piece_per_pallete').val();
	var one_piece_cycle_time = pallet_cycle_time/piece_per_pallete;

	var time_of_mfg = $('#time_of_mfg').val();

	var total_pcs = time_of_mfg*3600/one_piece_cycle_time;

	var pcs_per_hour = total_pcs/time_of_mfg;
	$('#pcs_per_hour').val(pcs_per_hour.toFixed(0));
}

function calculate_pcs_per_23_hrs(){
	var per_days_hour = $('#per_days_hour').val();

	var pallet_cycle_time = $('#pallet_cycle_time').val();
	var piece_per_pallete = $('#piece_per_pallete').val();
	var one_piece_cycle_time = pallet_cycle_time/piece_per_pallete;

	var time_of_mfg = $('#time_of_mfg').val();

	var total_pcs = time_of_mfg*3600/one_piece_cycle_time;

	var pcs_per_hour = total_pcs/time_of_mfg;

	var pcs_per_23_hrs = pcs_per_hour*per_days_hour;
	$('#pcs_per_23_hrs').val(pcs_per_23_hrs.toFixed(0));
}

function calculate_total_pcs_25_days(){

	var per_days_hour = $('#per_days_hour').val();
	var pallet_cycle_time = $('#pallet_cycle_time').val();
	var piece_per_pallete = $('#piece_per_pallete').val();
	var one_piece_cycle_time = pallet_cycle_time/piece_per_pallete;
	var time_of_mfg = $('#time_of_mfg').val();
	var total_pcs = time_of_mfg*3600/one_piece_cycle_time;
	var pcs_per_hour = total_pcs/time_of_mfg;
	var pcs_per_23_hrs = pcs_per_hour*per_days_hour;

	var month_per_day = $('#month_per_day').val();


	var total_pcs_25_days = month_per_day*pcs_per_23_hrs;
	$('#total_pcs_25_days').val(total_pcs_25_days.toFixed(0));
}

function calculate_per_pcs_labour(){

	var per_days_hour = $('#per_days_hour').val();
	var pallet_cycle_time = $('#pallet_cycle_time').val();
	var piece_per_pallete = $('#piece_per_pallete').val();
	var one_piece_cycle_time = pallet_cycle_time/piece_per_pallete;
	var time_of_mfg = $('#time_of_mfg').val();
	var total_pcs = time_of_mfg*3600/one_piece_cycle_time;
	var pcs_per_hour = total_pcs/time_of_mfg;
	var pcs_per_23_hrs = pcs_per_hour*per_days_hour;
	var month_per_day = $('#month_per_day').val();
	var total_pcs_25_days = month_per_day*pcs_per_23_hrs;

	var cnc_exp_month = $('#cnc_exp_month').val();

	var per_pcs_labour = cnc_exp_month/total_pcs_25_days;
	$('#per_pcs_labour').val(per_pcs_labour.toFixed(4));
}

function calculate_kg_per_hour(){

	var per_days_hour = $('#per_days_hour').val();
	var pallet_cycle_time = $('#pallet_cycle_time').val();
	var piece_per_pallete = $('#piece_per_pallete').val();
	var one_piece_cycle_time = pallet_cycle_time/piece_per_pallete;
	var time_of_mfg = $('#time_of_mfg').val();
	var total_pcs = time_of_mfg*3600/one_piece_cycle_time;
	var pcs_per_hour = total_pcs/time_of_mfg;
	var pcs_per_23_hrs = pcs_per_hour*per_days_hour;
	var month_per_day = $('#month_per_day').val();
	var total_pcs_25_days = month_per_day*pcs_per_23_hrs;
	var cnc_exp_month = $('#cnc_exp_month').val();
	var per_pcs_labour = cnc_exp_month/total_pcs_25_days;

	
	var time_of_mfg = $('#time_of_mfg').val();
	var pallet_cycle_time = $('#pallet_cycle_time').val();
	var piece_per_pallete = $('#piece_per_pallete').val();
	var one_piece_cycle_time = pallet_cycle_time/piece_per_pallete;
	var time_of_mfg = $('#time_of_mfg').val();
	var total_pcs = time_of_mfg*3600/one_piece_cycle_time;
	var pcs_per_hour = total_pcs/time_of_mfg;	

	var kg_per_hour = per_pcs_labour*pcs_per_hour;
	$('#kg_per_hour').val(kg_per_hour.toFixed(2));
}

function calculate_wait_per_100_pcs(){
	var finish_wait = $('#finish_wait').val();
	var wait_per_100_pcs = finish_wait;
	$('#wait_per_100_pcs').val(wait_per_100_pcs);
}

function calculate_labour_per_kg(){
	var wait_per_100_pcs = $('#wait_per_100_pcs').val();

	var per_days_hour = $('#per_days_hour').val();
	var pallet_cycle_time = $('#pallet_cycle_time').val();
	var piece_per_pallete = $('#piece_per_pallete').val();
	var one_piece_cycle_time = pallet_cycle_time/piece_per_pallete;
	var time_of_mfg = $('#time_of_mfg').val();
	var total_pcs = time_of_mfg*3600/one_piece_cycle_time;
	var pcs_per_hour = total_pcs/time_of_mfg;
	var pcs_per_23_hrs = pcs_per_hour*per_days_hour;
	var month_per_day = $('#month_per_day').val();
	var total_pcs_25_days = month_per_day*pcs_per_23_hrs;
	var cnc_exp_month = $('#cnc_exp_month').val();
	var per_pcs_labour = cnc_exp_month/total_pcs_25_days;

	var labour_per_kg = per_pcs_labour*100/wait_per_100_pcs;
	$('#labour_per_kg').val(labour_per_kg.toFixed(2));
}

function calculate_days(){
	var quentity = $('#quentity').val();

	var per_days_hour = $('#per_days_hour').val();
	var pallet_cycle_time = $('#pallet_cycle_time').val();
	var piece_per_pallete = $('#piece_per_pallete').val();
	var one_piece_cycle_time = pallet_cycle_time/piece_per_pallete;
	var time_of_mfg = $('#time_of_mfg').val();
	var total_pcs = time_of_mfg*3600/one_piece_cycle_time;
	var pcs_per_hour = total_pcs/time_of_mfg;
	var pcs_per_23_hrs = pcs_per_hour*per_days_hour; 

	var days = quentity/pcs_per_23_hrs;
	$('#days').val(days.toFixed(0));
}

function calculate_end_date(){
	var days = $('#days').val();
	var holidays = $('#holidays').val();
	var weekly_off = $('#weekly_off').val();
	var start_date = $('#start_date').val().split("/");
	days = parseInt(days, 10);
	holidays = parseInt(holidays, 10);
	weekly_off = parseInt(weekly_off, 10);
	var myDate = new Date(start_date[2], start_date[1], start_date[0]);
	myDate.setDate(myDate.getDate() + holidays + days + weekly_off - 1);
	var dd = myDate.getDate();
	var mm = myDate.getMonth();
	var yyyy = myDate.getFullYear();
	if(dd<10){
	    dd='0'+dd; //day formater
	}
	if(mm<10){
	    mm='0'+mm; //month formater
	}
	$('#end_date').val(dd+'/'+mm+'/'+yyyy);
}

function calculate_cnc_production_count(){
	var pcs_per_hour = $('#pcs_per_hour').val();
	var cnc_production_count = pcs_per_hour;
	$('#cnc_production_count').val(cnc_production_count);
}

function calculate_labour_cost(){
	var labour_per_kg = $('#labour_per_kg').val();
	var labour_cost = labour_per_kg;
	$('#labour_cost').val(labour_cost);
}

function calculate_machine_expense(){
	var cnc_exp_month = $('#cnc_exp_month').val();
	var machine_expense = cnc_exp_month;
	$('#machine_expense').val(machine_expense);
}

function calculate_total_labour(){
	var per_pcs_labour = $('#per_pcs_labour').val();
	var total_labour = per_pcs_labour*100;
	$('#total_labour').val(total_labour);
}

function calculate_pf_20_per(){
	var per_pcs_labour = $('#per_pcs_labour').val();
	var total_labour = per_pcs_labour*100;

	var pf_20_per = total_labour*20/100;
	$('#pf_20_per').val(pf_20_per);
}

function calculate_total_labour_pf(){
	var per_pcs_labour = $('#per_pcs_labour').val();
	var total_labour = per_pcs_labour*100;
	$('#total_labour').val(total_labour);

	var per_pcs_labour = $('#per_pcs_labour').val();
	var total_labour = per_pcs_labour*100;
	var pf_20_per = total_labour*20/100;

	var total_labour_pf = +total_labour + +pf_20_per;
	$('#total_labour_pf').val(total_labour_pf);
}

function calculate_platting_amount(){
	var platting_kg = $('#platting_kg').val();
	var finish_wait = $('#finish_wait').val();
	var platting_amount = platting_kg * finish_wait;

	$('#platting_amount').val(platting_amount);
}

function calculate_material_vabour_cost(){
	var chips_rate = $('#chips_rate').val();
	var solid_wait = $('#solid_wait').val();
	var finish_wait = $('#finish_wait').val();
	var chips_wait = solid_wait - finish_wait;
	var chips_reclaim = chips_rate * chips_wait;
	var twenty_per = $('#twenty_per').val();
	var rod_rate = twenty_per*2.2/100 + +twenty_per;
	var solid_wait = $('#solid_wait').val();
	var solid_amount = solid_wait * rod_rate;
	var net_material_amount = solid_amount - chips_reclaim;

	var per_pcs_labour = $('#per_pcs_labour').val();
	var total_labour = per_pcs_labour*100;
	var per_pcs_labour = $('#per_pcs_labour').val();
	var total_labour = per_pcs_labour*100;
	var pf_20_per = total_labour*20/100;
	var total_labour_pf = +total_labour + +pf_20_per;

	var platting_kg = $('#platting_kg').val();
	var finish_wait = $('#finish_wait').val();
	var platting_amount = platting_kg * finish_wait;

	var extra_charge = $('#extra_charge').val();

	var material_vabour_cost = +net_material_amount + +total_labour_pf + +platting_amount + +extra_charge;
	$('#material_vabour_cost').val(material_vabour_cost);
}


//script for cost calculation sheet end