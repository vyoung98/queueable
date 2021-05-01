
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


//Add to the Game Queue
var addGame=function(){
	var gameInput=document.getElementById("new-game");//Add a new game.
	var gameProgressInput=document.getElementById("new-game-progress");//Add a new game's progress.
	var gameholder=document.getElementById("game-queue");//ul of #game-queue

	//Create a new list item with the text from the #new-game:
	var listItem=createNewTaskElement(gameInput.value);
	if (gameInput.value == "") {
		console.log("Error Validation Message");
		alert("Please fill in the text box.");
		return false;
	}
	else{
		console.log("Added Show Successfully!");
		//Append listItem to gameholder
		gameholder.appendChild(listItem);

		gameInput.value="";
	}

}

//Add to the Book Queue
var addBook=function(){
	console.log("Add book...");
	//Create a new list item with the text from the #new-game:
	var listItem=createNewTaskElement(bookInput.value);
	if (bookInput.value == "") {
		console.log("Error Validation Message");
		alert("Please fill in the text box.");
		return false;
	}
	else{
		console.log("Add Task...");
		//Append listItem to gameholder
		bookholder.appendChild(listItem);

		bookInput.value="";
	}

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