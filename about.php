<!DOCTYPE html>
<html lang="en">
<?php require('connect-db.php');
  session_start();
  
  if (isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
  }
  include('navbar.php')

?>
<head>
<link rel="apple-touch-icon" sizes="180x180" href="icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icon/favicon-16x16.png">
    <link rel="manifest" href="icon/site.webmanifest">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="./themes/purple.css" type="text/css"/>
        <link rel="stylesheet" id="switcher-id" href="">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        
        <meta name="author" content="Vivian Tran vt5en & Valerie Young vy5br">
        <meta name="description" content="Assignment 1">  
        <title>queueAble: Finding Time for What's Important</title>  
       
    </head>

<?php
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
<div class="page-container">

<div class="jumbotron">
                <center>
              <h1>About Us</h1>
                </center>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-sm">
                <center>
                  <h1 class="display-5">Valerie Young</h1>
                <img src="https://i.imgur.com/icP5fku.jpg" style="max-width: 30em; max-height: 30em;">
                </p>
                    <h6>Major: B.A. Computer Science and Media Studies</h6>
                    <h6>Year: 4th Year</h6>
                    <h6>Email: vy5br@virginia.edu</h6>
                    <p>Outside of school, I like reading for my book club :)</p>
                </center>
              </div>
              <div class="col-sm">

              <center>
              <h1 class="display-5">Vivian Tran</h1>

                <img src="https://i.gyazo.com/9aeedcfd62fd51fcf71b27a036f2481c.jpg" style="max-width: 30em; max-height: 30em;">
                </p>

                <h6>Major: B.A. Computer Science</h6>
                    <h6>Year: 4th Year</h6>
                    <h6>Email: vt5en@virginia.edu</h6>
                    <p>Outside of school, I like to play video games!</p>
                </center>
              </div>
            </div>
          </div>