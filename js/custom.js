//custom js file

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