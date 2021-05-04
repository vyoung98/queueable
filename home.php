<!DOCTYPE html>
<html lang="en">
<?php 
  require('connect-db.php');
  session_start();
  if (isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['action']) && ($_POST['action'] == 'Delete')) {
        $event_title = $_POST['etitle'];
        $friend = $_POST['friend'];
        $date = $_POST['date'];
        $start_time = $_POST['stime'];
        $end_time = $_POST['etime'];

        $query = "DELETE FROM events WHERE username=:username AND event_title=:event_title AND friend=:friend AND date=:date AND start_time=:start_time AND end_time=:end_time";
        $statement = $db->prepare($query);

        $statement->bindValue(':username', $username);
        $statement->bindValue(':event_title', $event_title);
        $statement->bindValue(':friend', $friend);
        $statement->bindValue(':date', $date);
        $statement->bindValue(':start_time', $start_time);
        $statement->bindValue(':end_time', $end_time);

        $statement->execute();
        $statement->closeCursor();


        echo "<script>
        alert('Event has been deleted');
        window.location.href='home.php';
        </script>";
    }
}
  ?>
    <head>
    <link rel="apple-touch-icon" sizes="180x180" href="icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icon/favicon-16x16.png">
    <link rel="manifest" href="icon/site.webmanifest">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="./themes/purple.css">
        <link rel="stylesheet" id="switcher-id" href="">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        
        <meta name="author" content="Vivian Tran vt5en & Valerie Young vy5br">
        <meta name="description" content="Assignment 1">  
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
    <body>
      <?php include('./navbar.php');
        echo '<div class="jumbotron ">';
        echo '<center><h1>';
          if (isset($_SESSION['user'])) {
            echo "Welcome, " . $_SESSION['user'];
          }
          else {
            echo "<h1>Welcome to Queueable, Guest. Make an account!<h1>";
            echo "</br>";
            echo "<h2>Queueable is a website that lets you track your hobbies and share them with friends. You can have a queue for your shows, games, and books!<h2>";
            echo "</br>";
            echo '<center><button type="submit" class="btn"><a href="signup.php" style="color: white;">Sign Up</a></button></center>';
          }
          echo '</center></h1>';
          echo '</div>';
          ?>
          <?php
            if (isset($_SESSION['user'])) {?>
          <center><h1>My Calendar</h1>
          <button type="submit" class="btn"><a href="eventcreation.php" style="color: white;">Create</a></button>
          <button type="submit" class="btn"><a href="queue.php" style="color: white;">My Queues</a></button>
          </center>
          </br>
                <?php
                    }
                      if (!isset($_SESSION['user'])) {
                        echo "<h1 style='text-align:center;'>If you have an account, please log in to see your events!</h1>";
                        echo '<center><button type="submit" class="btn"><a href="login.php" style="color: white;">Log In</a></button></center>';
                      }
                      else {
                        $user = $_SESSION['user'];
                      
                      $query = "SELECT * FROM events WHERE username=:username ORDER BY date";
                      $statement = $db->prepare($query);
                      $statement->bindParam(':username', $user);
                      $statement->execute();
                      $events_info = $statement->fetchAll();
                      $statement->closecursor();
                      $output = "<h2>
                          <div class='container'>
                          <div class='row'>";

                      if (empty($events_info) && isset($_SESSION['user'])) {
                        echo "<h1 style='text-align:center;'>You don't have any events right now. Click Create!</h1>";
                        }
                    
                      echo "<div class='row'>";
                      
                          foreach ($events_info as $row) {
                          echo "<div class='col-sm-3'>";
                          echo "<div class='card' style='height: 25em; width: 20em; margin-bottom: 5vh; margin-left: 2vh;'>";
                          echo "<div class='card-body'>";
              
                          //event_title
                          echo "<h1 style='text-align:center;'>";
                          echo $event_title =  $row['event_title'];
                          echo "</h1>";

                          //friend
                          echo "<p> Friends Invited: ";
                          echo $friend =  $row['friend'];
                          echo "</p>";

                          //date
                          echo "<p> Event Date (YYYY-MM-DD): ";
                          echo $date =  $row['date'];
                          echo "</p>";

                          //start_time & end_time
                          echo "<p> Time: ";
                          echo $start_time = $row['start_time'];
                          echo " - ";
                          echo $end_time = $row ['end_time'];
                          echo "</p>";

                            //description
                            echo "<p style='margin-bottom: 2vh;'> Notes: ";
                            echo $descr = $row['descr'];
                            echo "</p>";
                            
                            echo "<div style='position: absolute; bottom: 5vh; align-items: center; justify-content: center;'>";
                            echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '"method="POST">';
                            echo '<input class="btn btn-primary" type="submit" value="Delete" name="action" />';
                            echo '<input type="hidden" name="etitle" value="' . $row['event_title'] . '" />';
                            echo '<input type="hidden" name="friend" value="' . $row['friend'] . '" />';
                            echo '<input type="hidden" name="date" value="' . $row['date'] . '" />';
                            echo '<input type="hidden" name="stime" value="' . $row['start_time'] . '" />';
                            echo '<input type="hidden" name="etime" value="' . $row['end_time'] . '" />';
                            echo "</form>";
                            echo "</div>";

                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                          }
                        
                          echo "</div>";
                          echo "</div>";
                          echo "</div>";
                        }
                        echo "</div>";
                      
                        
                  $query = "SELECT * FROM settings WHERE username=:username";
                  $statement = $db->prepare($query);
                  $statement->bindParam(':username', $username);
                  $statement->execute();
                  $settings_info = $statement->fetchAll();
                  $theme = $statement->fetchAll();
                  $statement->closecursor();
                  foreach ($settings_info as $row) {
                    $theme = $row['theme'];

                    if ($theme == "light"){
                      echo "<script>";
                      echo "document.getElementById('switcher-id').href = './themes/light.css';";
                      echo "</script>";
                    }
                    if ($theme == "sky"){
                      echo "<script>";
                      echo "document.getElementById('switcher-id').href = './themes/sky.css';";
                      echo "</script>";
                    }
                    if ($theme == "purple"){
                      echo "<script>";
                      echo "document.getElementById('switcher-id').href = './themes/purple.css';";
                      echo "</script>";
                    }
                    if ($theme == "dark"){
                      echo "<script>";
                      echo "document.getElementById('switcher-id').href = './themes/dark.css';";
                      echo "</script>";
                    }
                  }
                ?>
    </body>
</html>