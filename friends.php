<!DOCTYPE html>
<html lang="en">
<?php 
  require('connect-db.php');
  session_start();
  if (isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
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
    <?php include('navbar.php');
          if (!isset($_SESSION['user'])) {
            echo "<script>
            alert('You are not logged in');
            window.location.href='login.php';
            </script>";
          }
          ?>
          <?php
            if (isset($_SESSION['user'])) {?>
          <center><h1>My Friends</h1>
          <button type="submit" class="btn"><a style="color: white;" href="http://localhost:4200">New Friend Request</a></button>
          </center>
          </br>
                <?php
                        $user = $_SESSION['user'];
                      
                        $query = "SELECT * FROM friends WHERE name=:username ORDER BY f_name";
                        $statement = $db->prepare($query);
                        $statement->bindParam(':username', $user);
                        $statement->execute();
                        $friends_info = $statement->fetchAll();
                        $statement->closecursor();
                        $output = "<h2>
                            <div class='container'>
                            <div class='row'>";

                        if (empty($friends_info) && isset($_SESSION['user'])) {
                            echo "<h1 style='text-align:center;'>You don't have any friends right now. Request someone!</h1>";
                            }
                        
                        echo "<div class='row'>";
                        
                            foreach ($friends_info as $row) {
                            echo "<div class='col-sm-3'>";
                            echo "<div class='card' style='height: 15em; width: 20em; margin-bottom: 5vh; margin-left: 2vh;'>";
                            echo "<div class='card-body'>";
                
                            //friend name
                            echo "<h1 style='text-align:center;'>";
                            echo $f_name =  $row['f_name'];
                            echo "</h1>";

                            //friend
                            echo "<p><b> Friend's Email: </b>";
                            echo $f_email =  $row['f_email'];
                            echo "</p>";

                            //description
                            echo "<p style='margin-bottom: 2vh;'><b> Message: </b>";
                            echo $message = $row['message'];
                            echo "</p>";
                            
                            echo "<div style='position: absolute; bottom: 5vh; align-items: center; justify-content: center;'>";
                            echo '<input type="hidden" name="f_name" value="' . $row['f_name'] . '" />';
                            echo '<input type="hidden" name="f_email" value="' . $row['f_email'] . '" />';
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
    <?php include('./footer.php'); ?>
</html>