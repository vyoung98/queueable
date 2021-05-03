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
        <link rel="stylesheet" href="./styles/style.css">
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
                  font-size: 4em;
                }
            p   {font-family: 'Rubik', 'Arial';
                }
            input   {font-family: 'Rubik', 'Arial';
                }
            li {
              font-family: 'Rubik', 'Arial';
              font-size: 1.1em;
            }
        </style>
       
    </head>

    <?php
          // THIS IS THE ADD SHOW PHP STUFF
            if ($_SERVER["REQUEST_METHOD"] == "POST" && ($_POST['action'] == 'Add Show'))
            {
              $user = $_SESSION['user'];
              $showTitle = $_POST['new-show-title'];
              $showProg = $_POST['new-show-progress'];
              if (preg_match('(\d+;\d+)', $showProg) == True) {
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
              else {
                echo "<script> alert('Please enter Season/Episode in given format: DIGIT ; DIGIT'); </script>";
              }
            }

            // THIS IS THE ADD GAME STUFF
            if ($_SERVER["REQUEST_METHOD"] == "POST" && ($_POST['action'] == 'Add Game'))
            {
              $user = $_SESSION['user'];
              $gameTitle = $_POST['new-game-title'];
              $gameProg = $_POST['new-game-progress'];
            
              $query = "INSERT INTO games (username, game_title, progress) VALUES (:username, :game_title, :game_progress)";
              $statement = $db->prepare($query);
              $statement->bindParam(':username', $user);
              $statement->bindParam(':game_title', $gameTitle);
              $statement->bindParam(':game_progress', $gameProg);
              $statement->execute();
              $shows_info = $statement->fetchAll();
              $statement->closecursor();
            }

            // THIS IS THE ADD BOOK STUFF
            if ($_SERVER["REQUEST_METHOD"] == "POST" && ($_POST['action'] == 'Add Book'))
            {
              $user = $_SESSION['user'];
              $bookTitle = $_POST['new-book-title'];
              $bookPage = $_POST['new-book-page'];
              
              if (preg_match('/^[\d]+$/', $bookPage) == True) {
                $query = "INSERT INTO books (username, book_title, page) VALUES (:username, :book_title, :page)";
                $statement = $db->prepare($query);
                $statement->bindParam(':username', $user);
                $statement->bindParam(':book_title', $bookTitle);
                $statement->bindParam(':page', $bookPage);
                $statement->execute();
                $shows_info = $statement->fetchAll();
                $statement->closecursor();
              }
              else {
                echo "<script> alert('Please enter a digit for page number') </script>;";
              }
            }

            // DELETE SHOW STUFF
            if ($_SERVER["REQUEST_METHOD"] == "POST" && ($_POST['action'] == 'Delete Show'))
            {
              $user = $_SESSION['user'];
              $showTitle = $_POST['show_title'];
            
              $query = "DELETE FROM shows WHERE username=:username AND show_title=:show_title";
              $statement = $db->prepare($query);
              $statement->bindParam(':username', $user);
              $statement->bindParam(':show_title', $showTitle);
              $statement->execute();
              $shows_info = $statement->fetchAll();
              $statement->closecursor();
            }

            // DELETE GAME STUFF
            if ($_SERVER["REQUEST_METHOD"] == "POST" && ($_POST['action'] == 'Delete Game'))
            {
              $user = $_SESSION['user'];
              $gameTitle = $_POST['game_title'];
            
              $query = "DELETE FROM games WHERE username=:username AND game_title=:game_title";
              $statement = $db->prepare($query);
              $statement->bindParam(':username', $user);
              $statement->bindParam(':game_title', $gameTitle);
              $statement->execute();
              $shows_info = $statement->fetchAll();
              $statement->closecursor();
            }

            // DELETE BOOK STUFF
            if ($_SERVER["REQUEST_METHOD"] == "POST" && ($_POST['action'] == 'Delete Book'))
            {
              $user = $_SESSION['user'];
              $bookTitle = $_POST['book_title'];
            
              $query = "DELETE FROM books WHERE username=:username AND book_title=:book_title";
              $statement = $db->prepare($query);
              $statement->bindParam(':username', $user);
              $statement->bindParam(':book_title', $bookTitle);
              $statement->execute();
              $shows_info = $statement->fetchAll();
              $statement->closecursor();
            }

            // EDIT SHOW STUFF
            if (!empty($_POST['action']) && ($_POST['action'] == 'Edit Show'))
            {
                $_SESSION['id'] = $_POST['show_title'];
                header("Location: showEdit.php");
            }

            // EDIT GAME STUFF
            if (!empty($_POST['action']) && ($_POST['action'] == 'Edit Game'))
            {
                $_SESSION['id'] = $_POST['game_title'];
                header("Location: gameEdit.php");
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

          <!-- <div class="container"> -->
          <div class="jumbotron">
                <center>
              <h1>My Queues</h1>
                </center>
            </div>
            <div class="row">
              <div class="col border bg-light">
                <center><h2>Shows</h2>
                <!-- ADD BUTTON FOR SHOWS -->
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <input id="new-show-title" name="new-show-title" type="text" placeholder="Show Title" type="text">
                <input id="new-show-progress" name="new-show-progress" type="text" placeholder="Season; Episode" type="text">
                <input type="submit" class="btn btn-success my-2 my-sm-0" value="Add Show" name="action"></input>
                </form></center>

          <?php 
          $user = $_SESSION['user'];
          $query = "SELECT * FROM shows WHERE username = :username ORDER BY show_title";
          $statement = $db->prepare($query);
          $statement->bindParam(':username', $user);
          $statement->execute();
          $shows_info = $statement->fetchAll();
          $statement->closecursor();
          
          if (empty($shows_info)) {
            echo "<p style='text-align:center';>";
            echo "You aren't watching any shows right now. <p>";

          } else {
            foreach ($shows_info as $row) {
                echo "<ul class='todoList' id='show-queue'>";
                echo "<div class='custom'><li>" . $row['show_title'] . " S" . $row['season'] . "E" . $row['episode'];
                
                // EDIT BUTTON
                echo "<form action='" . $_SERVER['PHP_SELF'] . "' method='post' style='display:inline'>";
                echo '<input class="btn btn-primary" type="submit" value="Edit Show" name="action" />';
                echo '<input type="hidden" name="show_title" value="' . $row['show_title'] . '" />';

                // DELETE BUTTON
                echo "<form action='" . $_SERVER['PHP_SELF'] . "' method='post' style='display:inline'>";
                echo '<input class="btn btn-primary" type="submit" value="Delete Show" name="action" />';
                echo '<input type="hidden" name="show_title" value="' . $row['show_title'] . '" />' . "</li>";
                
                echo "</div></form>";
                echo "</ul>";
          }}
        ?>
        </div>

        <div class="col border bg-light">
          <center><h2>Games</h2>
              <!-- ADD BUTTON FOR GAMES -->
              <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
              <input id="new-game-title" name="new-game-title" type="text" placeholder="Game Title" type="text">
              <input id="new-game-progress" name="new-game-progress" type="text" placeholder="Progress" type="text">
              <input type="submit" class="btn btn-success my-2 my-sm-0" value="Add Game" name="action"></input>
          </form></center>

            <?php 
            $user = $_SESSION['user'];
            $query = "SELECT * FROM games WHERE username = :username ORDER BY game_title";
            $statement = $db->prepare($query);
            $statement->bindParam(':username', $user);
            $statement->execute();
            $games_info = $statement->fetchAll();
            $statement->closecursor();
            
            if (empty($games_info)) {
              echo "<p style='text-align:center';>";
              echo "You aren't playing any games right now. </p>";

            } else {
              foreach ($games_info as $row) {
                  echo "<ul class='todoList' id='game-queue'>";
                  echo "<div class='custom'><li>" . $row['game_title'] . ": " . $row['progress'];
                  
                  // EDIT BUTTON
                  echo "<form action='" . $_SERVER['PHP_SELF'] . "' method='post' style='display:inline'>";
                  echo '<input class="btn btn-primary" type="submit" value="Edit Game" name="action" />';
                  echo '<input type="hidden" name="game_title" value="' . $row['game_title'] . '" />';

                  // DELETE BUTTON
                  echo "<form action='" . $_SERVER['PHP_SELF'] . "' method='post' style='display:inline'>";
                  echo '<input class="btn btn-primary" type="submit" value="Delete Game" name="action" />';
                  echo '<input type="hidden" name="game_title" value="' . $row['game_title'] . '" />' . "</li>";
                  
                  echo "</div></form>";
                  echo "</ul>";
            }}
            ?>
          </div>

          <div class="col border bg-light">
          <center><h2>Books</h2>
                <!-- ADD BUTTON FOR BOOKS-->
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
              <input id="new-book-title" name="new-book-title" type="text" placeholder="Book Title" type="text">
              <input id="new-book-page" name="new-book-page" type="text" placeholder="Page #" type="text">
              <input type="submit" class="btn btn-success my-2 my-sm-0" value="Add Book" name="action"></input></center>

            <?php 
            $user = $_SESSION['user'];
            $query = "SELECT * FROM books WHERE username = :username ORDER BY book_title";
            $statement = $db->prepare($query);
            $statement->bindParam(':username', $user);
            $statement->execute();
            $books_info = $statement->fetchAll();
            $statement->closecursor();
            
            if (empty($books_info)) {
              echo "<p style='text-align:center';>";
              echo "You aren't reading any books right now. </p>";

            } else {
              foreach ($books_info as $row) {
                  echo "<ul class='todoList' id='book-queue'>";
                  echo "<div class='custom'><li>" . $row['book_title'] . ": Page " . $row['page'] . "   ";

                  // EDIT BUTTON
                  echo "<input type='submit' value='Edit' name='action' class='btn btn-primary' /></input>";

                  // DELETE BUTTON
                  echo "<form action='" . $_SERVER['PHP_SELF'] . "' method='post' style='display:inline'>";
                  echo '<input class="btn btn-primary" type="submit" value="Delete Book" name="action" />';
                  echo '<input type="hidden" name="book_title" value="' . $row['book_title'] . '" />' . "</li>";
                  
                  echo "</div></form>";
                  echo "</ul>";
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