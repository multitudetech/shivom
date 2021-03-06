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

	var extra_charge = $('#extra_charge').val();
	var platting_amount = $('#platting_amount').val();
	var total_labour_pf = $('#total_labour_pf').val();
	var net_material_amount = $('#net_material_amount').val();
	var material_vabour_cost = +extra_charge + +platting_amount + +total_labour_pf + +net_material_amount;
	$('#material_vabour_cost').val(material_vabour_cost);

	var final_inr = $('#final_inr').val();
	var material_vabour_cost = $('#material_vabour_cost').val();
	var percentage = final_inr*100/material_vabour_cost-100;
	$('#percentage').val(percentage);
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

	var finish_wait = $('#finish_wait').val();
	$('#wait_per_100_pcs').val(finish_wait);

	var wait_per_100_pcs = $('#wait_per_100_pcs').val();
	var per_pcs_labour = $('#per_pcs_labour').val();
	var labour_per_kg = (per_pcs_labour*100)/wait_per_100_pcs;
	$('#labour_per_kg').val(labour_per_kg);

	var labour_per_kg = $('#labour_per_kg').val();
	$('#labour_cost').val(labour_per_kg);

	var platting_kg = $('#platting_kg').val();
	var finish_wait = $('#finish_wait').val();
	var platting_amount = platting_kg*finish_wait;
	$('#platting_amount').val(platting_amount);

	var extra_charge = $('#extra_charge').val();
	var platting_amount = $('#platting_amount').val();
	var total_labour_pf = $('#total_labour_pf').val();
	var net_material_amount = $('#net_material_amount').val();
	var material_vabour_cost = +extra_charge + +platting_amount + +total_labour_pf + +net_material_amount;
	$('#material_vabour_cost').val(material_vabour_cost);

	var extra_charge = $('#extra_charge').val();
	var platting_amount = $('#platting_amount').val();
	var total_labour_pf = $('#total_labour_pf').val();
	var net_material_amount = $('#net_material_amount').val();
	var material_vabour_cost = +extra_charge + +platting_amount + +total_labour_pf + +net_material_amount;
	$('#material_vabour_cost').val(material_vabour_cost);

	var final_inr = $('#final_inr').val();
	var material_vabour_cost = $('#material_vabour_cost').val();
	var percentage = final_inr*100/material_vabour_cost-100;
	$('#percentage').val(percentage);
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

	var extra_charge = $('#extra_charge').val();
	var platting_amount = $('#platting_amount').val();
	var total_labour_pf = $('#total_labour_pf').val();
	var net_material_amount = $('#net_material_amount').val();
	var material_vabour_cost = +extra_charge + +platting_amount + +total_labour_pf + +net_material_amount;
	$('#material_vabour_cost').val(material_vabour_cost);

	var final_inr = $('#final_inr').val();
	var material_vabour_cost = $('#material_vabour_cost').val();
	var percentage = final_inr*100/material_vabour_cost-100;
	$('#percentage').val(percentage);

	var quentity = $('#quentity').val();
	var solid_wait = $('#solid_wait').val();
	var rod_kg = quentity*solid_wait/100;
	$('#rod_kg').val(rod_kg);
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

	var extra_charge = $('#extra_charge').val();
	var platting_amount = $('#platting_amount').val();
	var total_labour_pf = $('#total_labour_pf').val();
	var net_material_amount = $('#net_material_amount').val();
	var material_vabour_cost = +extra_charge + +platting_amount + +total_labour_pf + +net_material_amount;
	$('#material_vabour_cost').val(material_vabour_cost);

	var final_inr = $('#final_inr').val();
	var material_vabour_cost = $('#material_vabour_cost').val();
	var percentage = final_inr*100/material_vabour_cost-100;
	$('#percentage').val(percentage);
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

	var wait_per_100_pcs = $('#wait_per_100_pcs').val();
	var per_pcs_labour = $('#per_pcs_labour').val();
	var labour_per_kg = (per_pcs_labour*100)/wait_per_100_pcs;
	$('#labour_per_kg').val(labour_per_kg);

	var quentity = $('#quentity').val();
	var pcs_per_23_hrs = $('#pcs_per_23_hrs').val();
	var days = quentity/pcs_per_23_hrs;
	$('#days').val(days.toFixed(3));

	var pcs_per_hour = $('#pcs_per_hour').val();
	$('#cnc_production_count').val(pcs_per_hour);

	var labour_per_kg = $('#labour_per_kg').val();
	$('#labour_cost').val(labour_per_kg);

	var per_pcs_labour = $('#per_pcs_labour').val();
	var total_labour = per_pcs_labour*100;
	$('#total_labour').val(total_labour);

	var total_labour = $('#total_labour').val();
	var pf_20_per = (total_labour*20)/100;
	$('#pf_20_per').val(pf_20_per);

	var pf_20_per = $('#pf_20_per').val();
	var total_labour = $('#total_labour').val();
	var total_labour_pf = +pf_20_per + +total_labour;
	$('#total_labour_pf').val(total_labour_pf.toFixed(3));

	var extra_charge = $('#extra_charge').val();
	var platting_amount = $('#platting_amount').val();
	var total_labour_pf = $('#total_labour_pf').val();
	var net_material_amount = $('#net_material_amount').val();
	var material_vabour_cost = +extra_charge + +platting_amount + +total_labour_pf + +net_material_amount;
	$('#material_vabour_cost').val(material_vabour_cost);

	var final_inr = $('#final_inr').val();
	var material_vabour_cost = $('#material_vabour_cost').val();
	var percentage = final_inr*100/material_vabour_cost-100;
	$('#percentage').val(percentage);
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

	var wait_per_100_pcs = $('#wait_per_100_pcs').val();
	var per_pcs_labour = $('#per_pcs_labour').val();
	var labour_per_kg = (per_pcs_labour*100)/wait_per_100_pcs;
	$('#labour_per_kg').val(labour_per_kg);

	var quentity = $('#quentity').val();
	var pcs_per_23_hrs = $('#pcs_per_23_hrs').val();
	var days = quentity/pcs_per_23_hrs;
	$('#days').val(days.toFixed(3));

	var pcs_per_hour = $('#pcs_per_hour').val();
	$('#cnc_production_count').val(pcs_per_hour);

	var labour_per_kg = $('#labour_per_kg').val();
	$('#labour_cost').val(labour_per_kg);

	var per_pcs_labour = $('#per_pcs_labour').val();
	var total_labour = per_pcs_labour*100;
	$('#total_labour').val(total_labour);

	var total_labour = $('#total_labour').val();
	var pf_20_per = (total_labour*20)/100;
	$('#pf_20_per').val(pf_20_per);

	var pf_20_per = $('#pf_20_per').val();
	var total_labour = $('#total_labour').val();
	var total_labour_pf = +pf_20_per + +total_labour;
	$('#total_labour_pf').val(total_labour_pf.toFixed(3));

	var extra_charge = $('#extra_charge').val();
	var platting_amount = $('#platting_amount').val();
	var total_labour_pf = $('#total_labour_pf').val();
	var net_material_amount = $('#net_material_amount').val();
	var material_vabour_cost = +extra_charge + +platting_amount + +total_labour_pf + +net_material_amount;
	$('#material_vabour_cost').val(material_vabour_cost);

	var final_inr = $('#final_inr').val();
	var material_vabour_cost = $('#material_vabour_cost').val();
	var percentage = final_inr*100/material_vabour_cost-100;
	$('#percentage').val(percentage);
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

	var wait_per_100_pcs = $('#wait_per_100_pcs').val();
	var per_pcs_labour = $('#per_pcs_labour').val();
	var labour_per_kg = (per_pcs_labour*100)/wait_per_100_pcs;
	$('#labour_per_kg').val(labour_per_kg);

	var quentity = $('#quentity').val();
	var pcs_per_23_hrs = $('#pcs_per_23_hrs').val();
	var days = quentity/pcs_per_23_hrs;
	$('#days').val(days.toFixed(3));

	var pcs_per_hour = $('#pcs_per_hour').val();
	$('#cnc_production_count').val(pcs_per_hour);

	var labour_per_kg = $('#labour_per_kg').val();
	$('#labour_cost').val(labour_per_kg);

	var per_pcs_labour = $('#per_pcs_labour').val();
	var total_labour = per_pcs_labour*100;
	$('#total_labour').val(total_labour);

	var total_labour = $('#total_labour').val();
	var pf_20_per = (total_labour*20)/100;
	$('#pf_20_per').val(pf_20_per);

	var pf_20_per = $('#pf_20_per').val();
	var total_labour = $('#total_labour').val();
	var total_labour_pf = +pf_20_per + +total_labour;
	$('#total_labour_pf').val(total_labour_pf.toFixed(3));

	var extra_charge = $('#extra_charge').val();
	var platting_amount = $('#platting_amount').val();
	var total_labour_pf = $('#total_labour_pf').val();
	var net_material_amount = $('#net_material_amount').val();
	var material_vabour_cost = +extra_charge + +platting_amount + +total_labour_pf + +net_material_amount;
	$('#material_vabour_cost').val(material_vabour_cost);

	var final_inr = $('#final_inr').val();
	var material_vabour_cost = $('#material_vabour_cost').val();
	var percentage = final_inr*100/material_vabour_cost-100;
	$('#percentage').val(percentage);
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

	var wait_per_100_pcs = $('#wait_per_100_pcs').val();
	var per_pcs_labour = $('#per_pcs_labour').val();
	var labour_per_kg = (per_pcs_labour*100)/wait_per_100_pcs;
	$('#labour_per_kg').val(labour_per_kg);

	var quentity = $('#quentity').val();
	var pcs_per_23_hrs = $('#pcs_per_23_hrs').val();
	var days = quentity/pcs_per_23_hrs;
	$('#days').val(days.toFixed(3));

	var pcs_per_hour = $('#pcs_per_hour').val();
	$('#cnc_production_count').val(pcs_per_hour);

	var labour_per_kg = $('#labour_per_kg').val();
	$('#labour_cost').val(labour_per_kg);

	var per_pcs_labour = $('#per_pcs_labour').val();
	var total_labour = per_pcs_labour*100;
	$('#total_labour').val(total_labour);

	var total_labour = $('#total_labour').val();
	var pf_20_per = (total_labour*20)/100;
	$('#pf_20_per').val(pf_20_per);

	var pf_20_per = $('#pf_20_per').val();
	var total_labour = $('#total_labour').val();
	var total_labour_pf = +pf_20_per + +total_labour;
	$('#total_labour_pf').val(total_labour_pf.toFixed(3));

	var extra_charge = $('#extra_charge').val();
	var platting_amount = $('#platting_amount').val();
	var total_labour_pf = $('#total_labour_pf').val();
	var net_material_amount = $('#net_material_amount').val();
	var material_vabour_cost = +extra_charge + +platting_amount + +total_labour_pf + +net_material_amount;
	$('#material_vabour_cost').val(material_vabour_cost);

	var final_inr = $('#final_inr').val();
	var material_vabour_cost = $('#material_vabour_cost').val();
	var percentage = final_inr*100/material_vabour_cost-100;
	$('#percentage').val(percentage);
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

	var wait_per_100_pcs = $('#wait_per_100_pcs').val();
	var per_pcs_labour = $('#per_pcs_labour').val();
	var labour_per_kg = (per_pcs_labour*100)/wait_per_100_pcs;
	$('#labour_per_kg').val(labour_per_kg);

	var quentity = $('#quentity').val();
	var pcs_per_23_hrs = $('#pcs_per_23_hrs').val();
	var days = quentity/pcs_per_23_hrs;
	$('#days').val(days.toFixed(3));

	var labour_per_kg = $('#labour_per_kg').val();
	$('#labour_cost').val(labour_per_kg);

	var per_pcs_labour = $('#per_pcs_labour').val();
	var total_labour = per_pcs_labour*100;
	$('#total_labour').val(total_labour);

	var total_labour = $('#total_labour').val();
	var pf_20_per = (total_labour*20)/100;
	$('#pf_20_per').val(pf_20_per);

	var pf_20_per = $('#pf_20_per').val();
	var total_labour = $('#total_labour').val();
	var total_labour_pf = +pf_20_per + +total_labour;
	$('#total_labour_pf').val(total_labour_pf.toFixed(3));

	var extra_charge = $('#extra_charge').val();
	var platting_amount = $('#platting_amount').val();
	var total_labour_pf = $('#total_labour_pf').val();
	var net_material_amount = $('#net_material_amount').val();
	var material_vabour_cost = +extra_charge + +platting_amount + +total_labour_pf + +net_material_amount;
	$('#material_vabour_cost').val(material_vabour_cost);

	var final_inr = $('#final_inr').val();
	var material_vabour_cost = $('#material_vabour_cost').val();
	var percentage = final_inr*100/material_vabour_cost-100;
	$('#percentage').val(percentage);
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

	var wait_per_100_pcs = $('#wait_per_100_pcs').val();
	var per_pcs_labour = $('#per_pcs_labour').val();
	var labour_per_kg = (per_pcs_labour*100)/wait_per_100_pcs;
	$('#labour_per_kg').val(labour_per_kg);

	var labour_per_kg = $('#labour_per_kg').val();
	$('#labour_cost').val(labour_per_kg);

	var per_pcs_labour = $('#per_pcs_labour').val();
	var total_labour = per_pcs_labour*100;
	$('#total_labour').val(total_labour);

	var total_labour = $('#total_labour').val();
	var pf_20_per = (total_labour*20)/100;
	$('#pf_20_per').val(pf_20_per);

	var pf_20_per = $('#pf_20_per').val();
	var total_labour = $('#total_labour').val();
	var total_labour_pf = +pf_20_per + +total_labour;
	$('#total_labour_pf').val(total_labour_pf.toFixed(3));

	var extra_charge = $('#extra_charge').val();
	var platting_amount = $('#platting_amount').val();
	var total_labour_pf = $('#total_labour_pf').val();
	var net_material_amount = $('#net_material_amount').val();
	var material_vabour_cost = +extra_charge + +platting_amount + +total_labour_pf + +net_material_amount;
	$('#material_vabour_cost').val(material_vabour_cost);

	var final_inr = $('#final_inr').val();
	var material_vabour_cost = $('#material_vabour_cost').val();
	var percentage = final_inr*100/material_vabour_cost-100;
	$('#percentage').val(percentage);
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

	var wait_per_100_pcs = $('#wait_per_100_pcs').val();
	var per_pcs_labour = $('#per_pcs_labour').val();
	var labour_per_kg = (per_pcs_labour*100)/wait_per_100_pcs;
	$('#labour_per_kg').val(labour_per_kg);

	var labour_per_kg = $('#labour_per_kg').val();
	$('#labour_cost').val(labour_per_kg);

	var cnc_exp_month = $('#cnc_exp_month').val();
	$('#machine_expense').val(cnc_exp_month);

	var per_pcs_labour = $('#per_pcs_labour').val();
	var total_labour = per_pcs_labour*100;
	$('#total_labour').val(total_labour);

	var total_labour = $('#total_labour').val();
	var pf_20_per = (total_labour*20)/100;
	$('#pf_20_per').val(pf_20_per);

	var pf_20_per = $('#pf_20_per').val();
	var total_labour = $('#total_labour').val();
	var total_labour_pf = +pf_20_per + +total_labour;
	$('#total_labour_pf').val(total_labour_pf.toFixed(3));

	var extra_charge = $('#extra_charge').val();
	var platting_amount = $('#platting_amount').val();
	var total_labour_pf = $('#total_labour_pf').val();
	var net_material_amount = $('#net_material_amount').val();
	var material_vabour_cost = +extra_charge + +platting_amount + +total_labour_pf + +net_material_amount;
	$('#material_vabour_cost').val(material_vabour_cost);

	var final_inr = $('#final_inr').val();
	var material_vabour_cost = $('#material_vabour_cost').val();
	var percentage = final_inr*100/material_vabour_cost-100;
	$('#percentage').val(percentage);
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

$('#quentity').keyup(function(){
	var quentity = $('#quentity').val();
	var pcs_per_23_hrs = $('#pcs_per_23_hrs').val();
	var days = quentity/pcs_per_23_hrs;
	$('#days').val(days.toFixed(3));

	var days = $('#days').val();
	var holidays = $('#holidays').val();
	var weekly_off = $('#weekly_off').val();
	var start_date = $('#start_date').val().split("/");
	days = parseInt(days, 10);
	holidays = parseInt(holidays, 10);
	weekly_off = parseInt(weekly_off, 10);
	var myDate = new Date(start_date[2], start_date[1], start_date[0]);
	myDate.setDate(myDate.getDate() + holidays + days + weekly_off);
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
});

$('#holidays').keyup(function(){
	var days = $('#days').val();
	var holidays = $('#holidays').val();
	var weekly_off = $('#weekly_off').val();
	var start_date = $('#start_date').val().split("/");
	days = parseInt(days, 10);
	holidays = parseInt(holidays, 10);
	weekly_off = parseInt(weekly_off, 10);
	var myDate = new Date(start_date[2], start_date[1], start_date[0]);
	myDate.setDate(myDate.getDate() + holidays + days + weekly_off);
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
});

$('#weekly_off').keyup(function(){
	var days = $('#days').val();
	var holidays = $('#holidays').val();
	var weekly_off = $('#weekly_off').val();
	var start_date = $('#start_date').val().split("/");
	days = parseInt(days, 10);
	holidays = parseInt(holidays, 10);
	weekly_off = parseInt(weekly_off, 10);
	var myDate = new Date(start_date[2], start_date[1], start_date[0]);
	myDate.setDate(myDate.getDate() + holidays + days + weekly_off);
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
});

$('#start_date').keyup(function(){
	var days = $('#days').val();
	var holidays = $('#holidays').val();
	var weekly_off = $('#weekly_off').val();
	var start_date = $('#start_date').val().split("/");
	days = parseInt(days, 10);
	holidays = parseInt(holidays, 10);
	weekly_off = parseInt(weekly_off, 10);
	var myDate = new Date(start_date[2], start_date[1], start_date[0]);
	myDate.setDate(myDate.getDate() + holidays + days + weekly_off);
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
});

$('#platting_kg').keyup(function(){
	var platting_kg = $('#platting_kg').val();
	var finish_wait = $('#finish_wait').val();
	var platting_amount = platting_kg*finish_wait;
	$('#platting_amount').val(platting_amount);

	var extra_charge = $('#extra_charge').val();
	var platting_amount = $('#platting_amount').val();
	var total_labour_pf = $('#total_labour_pf').val();
	var net_material_amount = $('#net_material_amount').val();
	var material_vabour_cost = +extra_charge + +platting_amount + +total_labour_pf + +net_material_amount;
	$('#material_vabour_cost').val(material_vabour_cost);

	var final_inr = $('#final_inr').val();
	var material_vabour_cost = $('#material_vabour_cost').val();
	var percentage = final_inr*100/material_vabour_cost-100;
	$('#percentage').val(percentage);
});

$('#extra_charge').keyup(function(){
	var extra_charge = $('#extra_charge').val();
	var platting_amount = $('#platting_amount').val();
	var total_labour_pf = $('#total_labour_pf').val();
	var net_material_amount = $('#net_material_amount').val();
	var material_vabour_cost = +extra_charge + +platting_amount + +total_labour_pf + +net_material_amount;
	$('#material_vabour_cost').val(material_vabour_cost);

	var final_inr = $('#final_inr').val();
	var material_vabour_cost = $('#material_vabour_cost').val();
	var percentage = final_inr*100/material_vabour_cost-100;
	$('#percentage').val(percentage);
});

$('#final_inr').keyup(function(){
	var final_inr = $('#final_inr').val();
	var material_vabour_cost = $('#material_vabour_cost').val();
	var percentage = final_inr*100/material_vabour_cost-100;
	$('#percentage').val(percentage);
});

$('#quentity').keyup(function(){
	var quentity = $('#quentity').val();
	var solid_wait = $('#solid_wait').val();
	var rod_kg = quentity*solid_wait/100;
	$('#rod_kg').val(rod_kg);
});

$('#rod_rate').keyup(function(){
	var rod_rate = $('#rod_rate').val();
	var solid_wait = $('#solid_wait').val();
	var solid_amount = rod_rate*solid_wait;
	$('#solid_amount').val(solid_amount.toFixed(3));
});

$('#chips_wait').keyup(function(){
	var chips_rate = $('#chips_rate').val();
	var chips_wait = $('#chips_wait').val();
	var chips_reclaim = chips_rate*chips_wait;
	$('#chips_reclaim').val(chips_reclaim.toFixed(3));
});

$('#solid_amount').keyup(function(){
	var solid_amount = $('#solid_amount').val();
	var chips_reclaim = $('#chips_reclaim').val();
	var net_material_amount = solid_amount-chips_reclaim;
	$('#net_material_amount').val(net_material_amount.toFixed(3));
});

$('#chips_reclaim').keyup(function(){
	var solid_amount = $('#solid_amount').val();
	var chips_reclaim = $('#chips_reclaim').val();
	var net_material_amount = solid_amount-chips_reclaim;
	$('#net_material_amount').val(net_material_amount.toFixed(3));
});

$('#net_material_amount').keyup(function(){
	var extra_charge = $('#extra_charge').val();
	var platting_amount = $('#platting_amount').val();
	var total_labour_pf = $('#total_labour_pf').val();
	var net_material_amount = $('#net_material_amount').val();
	var material_vabour_cost = +extra_charge + +platting_amount + +total_labour_pf + +net_material_amount;
	$('#material_vabour_cost').val(material_vabour_cost);
});

$('#total_labour').keyup(function(){
	var total_labour = $('#total_labour').val();
	var pf_20_per = (total_labour*20)/100;
	$('#pf_20_per').val(pf_20_per);

	var pf_20_per = $('#pf_20_per').val();
	var total_labour = $('#total_labour').val();
	var total_labour_pf = +pf_20_per + +total_labour;
	$('#total_labour_pf').val(total_labour_pf.toFixed(3));
});

$('#pf_20_per').keyup(function(){ //doubt
	var pf_20_per = $('#pf_20_per').val();
	var total_labour = $('#total_labour').val();
	var total_labour_pf = +pf_20_per + +total_labour;
	$('#total_labour_pf').val(total_labour_pf.toFixed(3));
});

$('#total_labour_pf').keyup(function(){
	var extra_charge = $('#extra_charge').val();
	var platting_amount = $('#platting_amount').val();
	var total_labour_pf = $('#total_labour_pf').val();
	var net_material_amount = $('#net_material_amount').val();
	var material_vabour_cost = +extra_charge + +platting_amount + +total_labour_pf + +net_material_amount;
	$('#material_vabour_cost').val(material_vabour_cost);
});

$('#platting_amount').keyup(function(){
	var extra_charge = $('#extra_charge').val();
	var platting_amount = $('#platting_amount').val();
	var total_labour_pf = $('#total_labour_pf').val();
	var net_material_amount = $('#net_material_amount').val();
	var material_vabour_cost = +extra_charge + +platting_amount + +total_labour_pf + +net_material_amount;
	$('#material_vabour_cost').val(material_vabour_cost);
});

$('#material_vabour_cost').keyup(function(){
	var final_inr = $('#final_inr').val();
	var material_vabour_cost = $('#material_vabour_cost').val();
	var percentage = final_inr*100/material_vabour_cost-100;
	$('#percentage').val(percentage);
});

$('#total_pcs').keyup(function(){
	var time_of_mfg = $('#time_of_mfg').val();
	var total_pcs = $('#total_pcs').val();
	var pcs_per_hour = total_pcs/time_of_mfg;
	$('#pcs_per_hour').val(pcs_per_hour.toFixed(3));
});

$('#pcs_per_hour').keyup(function(){
	var per_pcs_labour = $('#per_pcs_labour').val();
	var pcs_per_hour = $('#pcs_per_hour').val();
	var kg_per_hour = per_pcs_labour*pcs_per_hour;
	$('#kg_per_hour').val(kg_per_hour.toFixed(3));

	var pcs_per_hour = $('#pcs_per_hour').val();
	var per_days_hour = $('#per_days_hour').val();
	var pcs_per_23_hrs = pcs_per_hour*per_days_hour;
	$('#pcs_per_23_hrs').val(pcs_per_23_hrs.toFixed(0));

	var pcs_per_hour = $('#pcs_per_hour').val();
	$('#cnc_production_count').val(pcs_per_hour);
});

$('#pcs_per_23_hrs').keyup(function(){
	var quentity = $('#quentity').val();
	var pcs_per_23_hrs = $('#pcs_per_23_hrs').val();
	var days = quentity/pcs_per_23_hrs;
	$('#days').val(days.toFixed(3));

	var month_per_day = $('#month_per_day').val();
	var pcs_per_23_hrs = $('#pcs_per_23_hrs').val();
	var total_pcs_25_days = month_per_day*pcs_per_23_hrs;
	$('#total_pcs_25_days').val(total_pcs_25_days.toFixed(3));
});

$('#total_pcs_25_days').keyup(function(){
	var cnc_exp_month = $('#cnc_exp_month').val();
	var total_pcs_25_days = $('#total_pcs_25_days').val();
	var per_pcs_labour = cnc_exp_month/total_pcs_25_days;
	$('#per_pcs_labour').val(per_pcs_labour.toFixed(3));
});

$('#per_pcs_labour').keyup(function(){
	var per_pcs_labour = $('#per_pcs_labour').val();
	var pcs_per_hour = $('#pcs_per_hour').val();
	var kg_per_hour = per_pcs_labour*pcs_per_hour;
	$('#kg_per_hour').val(kg_per_hour.toFixed(3));

	var per_pcs_labour = $('#per_pcs_labour').val();
	var total_labour = per_pcs_labour*100;
	$('#total_labour').val(total_labour);

	var wait_per_100_pcs = $('#wait_per_100_pcs').val();
	var per_pcs_labour = $('#per_pcs_labour').val();
	var labour_per_kg = (per_pcs_labour*100)/wait_per_100_pcs;
	$('#labour_per_kg').val(labour_per_kg);
});

$('#wait_per_100_pcs').keyup(function(){
	var wait_per_100_pcs = $('#wait_per_100_pcs').val();
	var per_pcs_labour = $('#per_pcs_labour').val();
	var labour_per_kg = (per_pcs_labour*100)/wait_per_100_pcs;
	$('#labour_per_kg').val(labour_per_kg);
});

$('#labour_per_kg').keyup(function(){
	var labour_per_kg = $('#labour_per_kg').val();
	$('#labour_cost').val(labour_per_kg);
});

$('#days').keyup(function(){
	var days = $('#days').val();
	var holidays = $('#holidays').val();
	var weekly_off = $('#weekly_off').val();
	var start_date = $('#start_date').val().split("/");
	days = parseInt(days, 10);
	holidays = parseInt(holidays, 10);
	weekly_off = parseInt(weekly_off, 10);
	var myDate = new Date(start_date[2], start_date[1], start_date[0]);
	myDate.setDate(myDate.getDate() + holidays + days + weekly_off);
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
});

$('#basic_rate').keyup(function(){
	var basic_rate = $('#basic_rate').val();
	var job_charge = $('#job_charge').val();
	var size_premimum = $('#size_premimum').val();
	var loe = $('#loe').val();
	var holo = $('#holo').val();
	var twenty_per = +basic_rate + +job_charge + +size_premimum + +loe + +holo;

	$('#twenty_per').val(twenty_per);
});

$('#job_charge').keyup(function(){
	var basic_rate = $('#basic_rate').val();
	var job_charge = $('#job_charge').val();
	var size_premimum = $('#size_premimum').val();
	var loe = $('#loe').val();
	var holo = $('#holo').val();
	var twenty_per = +basic_rate + +job_charge + +size_premimum + +loe + +holo;

	$('#twenty_per').val(twenty_per);
});

$('#size_premimum').keyup(function(){
	var basic_rate = $('#basic_rate').val();
	var job_charge = $('#job_charge').val();
	var size_premimum = $('#size_premimum').val();
	var loe = $('#loe').val();
	var holo = $('#holo').val();
	var twenty_per = +basic_rate + +job_charge + +size_premimum + +loe + +holo;

	$('#twenty_per').val(twenty_per);
});

$('#loe').keyup(function(){
	var basic_rate = $('#basic_rate').val();
	var job_charge = $('#job_charge').val();
	var size_premimum = $('#size_premimum').val();
	var loe = $('#loe').val();
	var holo = $('#holo').val();
	var twenty_per = +basic_rate + +job_charge + +size_premimum + +loe + +holo;

	$('#twenty_per').val(twenty_per);
});

$('#holo').keyup(function(){
	var basic_rate = $('#basic_rate').val();
	var job_charge = $('#job_charge').val();
	var size_premimum = $('#size_premimum').val();
	var loe = $('#loe').val();
	var holo = $('#holo').val();
	var twenty_per = +basic_rate + +job_charge + +size_premimum + +loe + +holo;

	$('#twenty_per').val(twenty_per);
});