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
	//button.edit
	var editButton=document.createElement("button");//edit button

	//button.delete
	var deleteButton=document.createElement("button");//delete button

	label.innerText=taskString;

	//Each elements, needs appending
	editInput.type="text";

	editButton.innerText="Edit"; //innerText encodes special characters, HTML does not.
	editButton.className="edit";
	deleteButton.innerText="Delete";
	deleteButton.className="delete";

	//and appending.
	listItem.appendChild(label);
	// listItem.appendChild(editInput);
	listItem.appendChild(editButton);
	listItem.appendChild(deleteButton);
	return listItem;
}

//Add to the Show Queue
var addShow=function(){
	console.log("Add Task...");
	//Create a new list item with the text from the #new-show:
	var listItem=createNewTaskElement(showInput.value);

	//Append listItem to showholder
	showholder.appendChild(listItem);
	// bindTaskEvents(listItem, taskCompleted);

	showInput.value="";

}

//Add to the Game Queue
var addGame=function(){
	console.log("Add Task...");
	//Create a new list item with the text from the #new-game:
	var listItem=createNewTaskElement(gameInput.value);

	//Append listItem to gameholder
	gameholder.appendChild(listItem);
	// bindTaskEvents(listItem, taskCompleted);

	gameInput.value="";

}

//Add to the Book Queue
var addBook=function(){
	console.log("Add Task...");
	//Create a new list item with the text from the #new-book:
	var listItem=createNewTaskElement(bookInput.value);

	//Append listItem to bookholder
	bookholder.appendChild(listItem);
	// bindTaskEvents(listItem, taskCompleted);

	bookInput.value="";

}

//Edit an existing task.

var editTask=function(){
console.log("Edit Task...");
console.log("Change 'edit' to 'save'");


var listItem=this.parentNode;

var editInput=listItem.querySelector('input[type=text]');
var label=listItem.querySelector("label");
var containsClass=listItem.classList.contains("editMode");
		//If class of the parent is .editmode
		if(containsClass){

		//switch to .editmode
		//label becomes the inputs value.
			label.innerText=editInput.value;
		}else{
			editInput.value=label.innerText;
		}

		//toggle .editmode on the parent.
		listItem.classList.toggle("editMode");
}


//Delete task.
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

//The glue to hold it all together.


//Set the click handler to the addTask function.
addButton.onclick=addTask;
addButton.addEventListener("click",addTask);
addButton.addEventListener("click",ajaxRequest);


//cycle over gameholder ul list items
	// //for each list item
	// for (var i=0; i<gameholder.children.length;i++){

	// 	//bind events to list items chldren(tasksCompleted)
	// 	bindTaskEvents(gameholder.children[i],taskCompleted);
	// }



// Issues with usabiliy don't get seen until they are in front of a human tester.

//prevent creation of empty tasks.

//Shange edit to save when you are in edit mode.