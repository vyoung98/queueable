<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <link rel="stylesheet" href="styles/style.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        
        <meta name="author" content="Vivian Tran vt5en & Valerie Young vy5br">
        <meta name="description" content="POTD 1">  
        <title>queueAble: Finding Time for What's Important</title>  
        <style type="text/css">
            h1	{font-family: 'Rubik', Arial;
                }
        </style>
       
    </head>

    <body>
          <?php include('header.html')?>

          <div class="container">
            <div class="row">
              <div class="col">
                <h2>Shows</h2>
                <!-- ADD BUTTON FOR SHOWS -->
                <input id="new-show" type="text" placeholder="Show Title; Progress" type="text">
                <button class="btn btn-success my-2 my-sm-0" type="submit" onclick="addShow()">Add</button>

                  <ul class="todoList" id="show-queue">
                    <li>Attack on Titan; S1 E2</li>
                  </ul>
              </div>

              <div class="col">
                <h2>Games</h2>
                <!-- ADD BUTTON FOR GAMES -->
                <input id="new-game" type="text" placeholder="Show Title; Progress" type="text">
                <button class="btn btn-success my-2 my-sm-0" type="submit" onclick="addGame()">Add</button>

                <ul class="todoList" id="game-queue">
                  <li>Stardew Valley; Y2 Fall</li>
                  <li>Terraria; Crimson Cave</li>
                </ul>
              </div>

              <div class="col">
                <h2>Books</h2>
                <!-- ADD BUTTON FOR BOOKS-->
                <input id="new-book" type="text" placeholder="Show Title; Progress" type="text">
                <button class="btn btn-success my-2 my-sm-0" type="submit" onclick="addBook()">Add</button>

                <ul class="todoList" id="book-queue">
                  <li>Percy Jackson; Pg24</li>
                </ul>
              </div>
            </div>
          </div>

          <script type="text/javascript" src="js/script.js"></script>
    </body>
</html>