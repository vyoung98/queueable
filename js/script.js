
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
