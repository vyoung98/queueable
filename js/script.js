//Document is the DOM can be accessed in the console with document.window.
// Tree is from the top, html, body, p etc.

//Problem: User interaction does not provide the correct results.
//Solution: Add interactivity so the user can manage daily tasks.
//Break things down into smaller steps and take each step at a time.


//Event handling, uder interaction is what starts the code execution.

var showInput=document.getElementById("new-show");//Add a new show.
var showholder=document.getElementById("show-queue");//ul of #show-queue

var gameInput=document.getElementById("new-game");//Add a new game.
var gameholder=document.getElementById("game-queue");//ul of #game-queue

var bookInput=document.getElementById("new-book");//Add a new book.
var bookholder=document.getElementById("book-queue");//ul of #book-queue


//New task list item
var createNewTaskElement=function(taskString){

	var listItem=document.createElement("li");

	//label
	var label=document.createElement("label");//label
	//input (text)
	var editInput=document.createElement("input");//text

	label.innerText=taskString;

	//need spacer
	var spacer = document.createTextNode("\xa0");

    //button.delete
	var deleteButton=document.createElement("button");//delete button
    deleteButton.innerHTML= '<i class="fas fa-trash-alt"></i>';
	// deleteButton.innerText="Delete";
	deleteButton.className="btn btn-warning";
	deleteButton.onclick=deleteTask;

	//and appending.
	listItem.appendChild(label);
	listItem.appendChild(spacer);
    listItem.appendChild(deleteButton);
	return listItem;
}

//Add to the Show Queue
var addShow=function(){

	//Create a new list item with the text from the #new-show:
	var listItem=createNewTaskElement(showInput.value);
	if (showInput.value == "") {
		console.log("Error Validation Message");
		alert("Please fill in the text box.");
		return false;
	}
	else{
		console.log("Add show...");
		//Append listItem to showholder
		showholder.appendChild(listItem);
		// bindTaskEvents(listItem, taskCompleted);

		showInput.value="";
	}

}

//Add to the Game Queue
var addGame=function(){
	console.log("Add game...");
	//Create a new list item with the text from the #new-game:
	var listItem=createNewTaskElement(gameInput.value);
	if (gameInput.value == "") {
		console.log("Error Validation Message");
		alert("Please fill in the text box.");
		return false;
	}
	else{
		console.log("Add Task...");
		//Append listItem to gameholder
		gameholder.appendChild(listItem);
		// bindTaskEvents(listItem, taskCompleted);

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
		// bindTaskEvents(listItem, taskCompleted);

		bookInput.value="";
	}

}


// Delete task.
var deleteTask=function(){
		console.log("Delete Task...");

		var listItem=this.parentNode;
		var ul=listItem.parentNode;
		//Remove the parent list item from the ul.
		ul.removeChild(listItem);

}

var ajaxRequest=function(){
	console.log("AJAX Request");
}