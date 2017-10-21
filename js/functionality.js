function delete_wo(id){
	var params = new Array();
	params['id'] = id;
	params['delete'] = true;

    if(confirm("Are you sure you want to delete "+id+" work order?")==true){

        var method = "post";
        var path = "work_order.php";
        var form = document.createElement("form");
	    form.setAttribute("method", method);
	    form.setAttribute("action", path);

	    for(var key in params) {
	        if(params.hasOwnProperty(key)) {
	            var hiddenField = document.createElement("input");
	            hiddenField.setAttribute("type", "hidden");
	            hiddenField.setAttribute("name", key);
	            hiddenField.setAttribute("value", params[key]);

	            form.appendChild(hiddenField);
	         }
	    }

	    document.body.appendChild(form);
    	form.submit();
    }
}