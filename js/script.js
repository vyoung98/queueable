
var bookInput=document.getElementById("new-book");//Add a new book.
var bookPageInput=document.getElementById("new-book-page");//Add a new book's page number.
var bookholder=document.getElementById("book-queue");//ul of #book-queue

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


// Delete task.
var deleteTask=function(){
		console.log("Delete Task...");

		var listItem=this.parentNode;
		var ul=listItem.parentNode;
		//Remove the parent list item from the ul list.
		ul.removeChild(listItem);

}

var ajaxRequest=function(){
	console.log("AJAX Request");
}

// Calendar Date Picker
$(document).ready(function(){
	var date_input=$('input[name="date"]'); //our date input has the name "date"
	var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
	var options={
	  format: 'mm/dd/yyyy',
	  container: container,
	  todayHighlight: true,
	  autoclose: true,
	};
	date_input.datepicker(options);
  })