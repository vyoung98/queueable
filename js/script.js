
//New task list item
var createNewTaskElement=function(taskString){

	var listItem=document.createElement("li");

	//label
	var label=document.createElement("label");
	//input (text)
	var editInput=document.createElement("input");

	label.innerText=taskString;

	//need spacer
	var spacer = document.createTextNode("\xa0");

    //button.delete
	var deleteButton=document.createElement("button");//delete button
    deleteButton.innerHTML= '<i class="fas fa-trash-alt"></i>';
	deleteButton.className="btn btn-warning";
	deleteButton.addEventListener("click", deleteTask);

	//and appending.
	listItem.appendChild(label);
	listItem.appendChild(spacer);
    listItem.appendChild(deleteButton);
	return listItem;
}

var ajaxRequest=function(){
	console.log("AJAX Request");
}

// Calendar Date Picker
$(document).ready(function(){
	var date_input=$('input[name="date"]'); //our date input has the name "date"
	var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
	date_input.datepicker({
		format: 'yyyy-mm-dd',
		container: container,
		todayHighlight: true,
		autoclose: true,
	})
})
