<!DOCTYPE html>
<html lang="en">
<?php 
  require('connect-db.php');
  session_start();?>
    <head>
        <link rel="apple-touch-icon" sizes="180x180" href="icon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="icon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="icon/favicon-16x16.png">
        <link rel="manifest" href="icon/site.webmanifest">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <link rel="stylesheet" href="./themes/purple.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        
        <meta name="author" content="Vivian Tran vt5en & Valerie Young vy5br">
        <meta name="description" content="POTD 1">  
        <title>queueAble: Finding Time for What's Important</title>  
        <style type="text/css">
            h1	{font-family: 'Rubik', Arial;
                }
            h2   {font-family: 'Rubik', 'Arial';
                  font-size: 25px;
                }
            p   {font-family: 'Rubik', 'Arial';
                }
        </style>
       
    </head>

    <?php
          // THIS IS THE ADD SHOW PHP STUFF
            if ($_SERVER["REQUEST_METHOD"] == "POST" && ($_POST['action'] == 'Add'))
            {
              $user = $_SESSION['user'];
              $showTitle = $_POST['new-show-title'];
              $showProg = $_POST['new-show-progress'];
              $pieces = explode(";", $showProg);
              $showSeason = $pieces[0];
              $showEpisode = $pieces[1];
            
              $query = "INSERT INTO shows (username, show_title, season, episode) VALUES (:username, :show_title, :show_season, :show_episode)";
              $statement = $db->prepare($query);
              $statement->bindParam(':username', $user);
              $statement->bindParam(':show_title', $showTitle);
              $statement->bindParam(':show_season', $showSeason);
              $statement->bindParam(':show_episode', $showEpisode);
              $statement->execute();
              $shows_info = $statement->fetchAll();
              $statement->closecursor();
            }
          ?>

    <body>
          <?php include('navbar.php');
          if (!isset($_SESSION['user'])) {
            echo "<script>
            alert('You are not logged in');
            window.location.href='login.php';
            </script>";
          }
          ?>

          <div class="container">
            <div class="row">
              <div class="col">
                <h2>Shows</h2>
                <!-- ADD BUTTON FOR SHOWS -->
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <input id="new-show-title" name="new-show-title" type="text" placeholder="Show Title" type="text">
                <input id="new-show-progress" name="new-show-progress" type="text" placeholder="Season; Episode" type="text">
                <input type="submit" class="btn btn-success my-2 my-sm-0" onclick="addShow()" value="Add" name="action"></input>
                <!-- <input type="submit" value="addShow" name="action" class="btn btn-secondary" /> -->
                </form>

          <?php 
          $user = $_SESSION['user'];
          $query = "SELECT * FROM shows WHERE username = :username ORDER BY show_title";
          $statement = $db->prepare($query);
          $statement->bindParam(':username', $user);
          $statement->execute();
          $shows_info = $statement->fetchAll();
          $statement->closecursor();
          
          if (empty($shows_info)) {
            echo "You aren't watching any shows right now.";

          } else {
            foreach ($shows_info as $row) {
                echo  "<ul class='todoList' id='show-queue'>";
                echo  "<li>" . $row['show_title'] . " S" . $row['season'] . "E" . $row['episode'] . "</li>";
                echo  "</ul>";
          }}
        ?>
        </div>

            <div class="col">
              <h2>Games</h2>
              <!-- ADD BUTTON FOR GAMES -->
              <input id="new-game-title" type="text" placeholder="Game Title" type="text">
              <input id="new-game-progress" type="text" placeholder="Progress" type="text">
              <button class="btn btn-success my-2 my-sm-0" type="submit" onclick="addGame()">Add</button>

            <?php 
            $user = $_SESSION['user'];
            $query = "SELECT * FROM games WHERE username = :username ORDER BY game_title";
            $statement = $db->prepare($query);
            $statement->bindParam(':username', $user);
            $statement->execute();
            $games_info = $statement->fetchAll();
            $statement->closecursor();
            
            if (empty($games_info)) {
              echo "You aren't playing any games right now.";

            } else {
              foreach ($games_info as $row) {
                  echo  "<ul class='todoList' id='game-queue'>";
                  echo  "<li>" . $row['game_title'] . ": " . $row['progress'] . "</li>";
                  echo  "</ul>";
            }}
            ?>
          </div>

          <div class="col">
          <h2>Books</h2>
                <!-- ADD BUTTON FOR BOOKS-->
                <input id="new-book-title" type="text" placeholder="Book Title" type="text">
                <input id="new-book-page" type="text" placeholder="Page #" type="text">
                <button class="btn btn-success my-2 my-sm-0" type="submit" onclick="addBook()">Add</button>

            <?php 
            $user = $_SESSION['user'];
            $query = "SELECT * FROM books WHERE username = :username ORDER BY book_title";
            $statement = $db->prepare($query);
            $statement->bindParam(':username', $user);
            $statement->execute();
            $books_info = $statement->fetchAll();
            $statement->closecursor();
            
            if (empty($books_info)) {
              echo "You aren't reading any books right now.";

            } else {
              foreach ($books_info as $row) {
                  echo  "<ul class='todoList' id='book-queue'>";
                  echo  "<li>" . $row['book_title'] . ": Page " . $row['page'] . "</li>";
                  echo  "</ul>";
            }}
            ?>
          </div>
          
          <script type="text/javascript" src="js/script.js"></script>
          <script>
            window.onload = function() {
              let style = sessionStorage.getItem('style');
              if (style == null) {
                    setTheme('light');
                  } else {
                    setTheme(style);
                  }
            }
          </script>
    </body>
</html>