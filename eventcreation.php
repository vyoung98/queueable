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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
        <link rel="stylesheet" href="./themes/purple.css" type="text/css">
        <link rel="stylesheet" id="switcher-id" href="">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
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
    <body>
      <?php include('navbar.php')?>
    
      <?php
    //checks that the user is logged in
    if (isset($_SESSION['user'])){
        //checks for post
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if (!empty($_POST['action']) && ($_POST['action'] == 'Cancel'))
            {
                unset($_SESSION['id']);
                header("Location: home.php");
            }
            else
            {
                $username = $_SESSION['user'];
                $title = $_POST['title'];
                $friend = $_POST['friend'];
                $date = $_POST['date'];
                $starttime = $_POST['starttime'];
                $endtime = $_POST['endtime'];
                $descr = $_POST['descr'];

                $query = "INSERT INTO events (username, event_title, friend, date, start_time, end_time, descr) 
                    VALUES (:username, :title, :friend, :date, :starttime, :endtime, :descr)";
                $statement = $db->prepare($query);
                $statement->bindValue(':username', $username);
                $statement->bindValue(':title', $title);
                $statement->bindValue(':friend', $friend);
                $statement->bindValue(':date', $date);
                $statement->bindValue(':starttime', $starttime);
                $statement->bindValue(':endtime', $endtime);
                $statement->bindValue(':descr', $descr);         
                $statement->execute();
                $statement->closeCursor();
                unset($_SESSION['id']);
                echo "<script>
                alert('Event created');
                window.location.href='home.php';
                </script>";
            }
          }
        }
      ?>

          <div class="container">
            <h1><center>Create an Event!</center></h1>
            <form class="needs-validation" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" novalidate>
              <div class="form-group">
                <label for="title">Event Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
              </div>

              <div class="form-group">
                <label for="inviteFriend">Invite a Friend:</label>
                <input type="text" class="form-control" id="friend" name="friend" placeholder="friend" required>
                </select>
              </div>

              <div class="form-group">
                <label class="control-label" for="date">Date</label>
                <input class="form-control" id="date" name="date" placeholder="YYYY-MM-DD" type="text" required>
              </div>

              <div class="form-row">
                <div class="col">
                <label class="control-label" for="date">Start Time</label>
                  <input type="text" class="form-control" id="starttime" name="starttime" placeholder="00:00" required>
                </div>

                <div class="col">
                <label class="control-label" for="date">End Time</label>
                  <input type="text" class="form-control" id="endtime" name="endtime" placeholder="01:00" required>
                </div>
              </div>

              <p></p>
              <div class="form-group">
                <label for="descr">Description</label>
                <textarea class="form-control" id="descr" name="descr" rows="3"></textarea>
              </div>

              <div class="row">
                <div class="form-group col-md">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
                </br>
              <div class="form-group col-md">
                <input type="submit" value="Cancel" name="action" class="btn btn-secondary" />
              </div>
            </form>
          </div>

          <script type="text/javascript" src="js/script.js"></script>
          <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
              'use strict';
              window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                  form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                      event.preventDefault();
                      event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                  }, false);
                });
              }, false);
            })();
          </script>
    </body>
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
      include('./footer.php'); ?>
</html>