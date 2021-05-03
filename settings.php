<!DOCTYPE html>
<html lang="en">
<?php 
  require('connect-db.php');
  session_start();
  $username = $_SESSION['user'];
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['action'])) {
      $username = $_SESSION['user'];
      $theme = $_POST['action'];
      $query = "UPDATE settings SET theme=:theme WHERE username=:username";
      $statement = $db->prepare($query);
      $statement->bindValue(':theme', $theme);
      $statement->bindValue(':username', $username);
      $statement->execute();
      $statement->closeCursor();
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
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <link rel="stylesheet" href="./themes/purple.css">
        <link rel="stylesheet" id="switcher-id" href="">
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

          <div class="container">
            <div class="row">
            <div class="col">
                <h2>Password</h2>
                <form class="needs-validation" id ="changepassword" name="changepassword" action="changep.php" method="POST">
                <input id="currentPassword" name="currentPassword" type="password" placeholder="Enter Current Password" type="text" required> <!-- need to put in a validation message if empty -->
                <p></p>
                <input id="newPassword" name="newPassword" type="password" placeholder="Enter New Password" type="text" required>
                <p></p>
                <input id="confirmPassword" name="confirmPassword" type="password" placeholder="Confirm New Password" type="text" required>
                <button class="btn" type="submit" onclick="">Change Password</button>
              </form>
              </div>

              <div class="col">
                <h2>Email</h2>
                <form class="needs-validation" id ="changeemail" name="changeemail" action="changee.php" method="POST">
                <input id="old-email" type="text" placeholder="Enter Old Email" required> <!-- need to put in a validation message if empty -->
                <p></p>
                <input id="newEmail" name="newEmail" type="text" placeholder="Enter Email Again" required>
                <p></p>
                <input id="confirm-email" type="text" placeholder="Confirm New Email" required>
                <button class="btn" type="submit" onclick="">Change Email</button>
              </form>
          
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

                <!-- password check makes all the fields mandatory, checks if the password fields are the same -->
                <script>
                  function changePassword() {
                    var currentPassword, newPassword, confirmPassword,output = true;
                    currentPassword = document.frmChange.currentPassword;
                    newPassword = document.frmChange.newPassword;
                    confirmPassword = document.frmChange.confirmPassword;

                    if (!currentPassword.value) {
                      currentPassword.focus();
                      document.getElementById("currentPassword").innerHTML = "required";
                      output = false;
                    }
                    else if(!newPassword.value) {
                      newPassword.focus();
                      document.getElementById("newPassword").innerHTML = "required";
                      output = false;
                    }
                    else if(!confirmPassword.value) {
                      newPassword.focus();
                      document.getElementById("confirmPassword").innerHTML = "required";
                      output = false;
                    }
                    if (newPassword.value != confirmPassword.value) {
                      newPassword.value="";
                      confirmPassword.value="";
                      newPassword.focus();
                      document.getElementById("confirmPassword").innerHTML = "not the same";
                      output = false;
                    }
                    return output;
                  }
                  </script>

              </div>

              <div class="col">
                <h2>Theme Selector</h2>
                <div class="theme-switches">
                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                <input type="submit" class="switch-1" id="switch-1" method="POST" name="action" value="light"></input>
                <input type="submit" class="switch-2" id="switch-2" method="POST" name="action" value="sky"></input>
                <input type="submit" class="switch-3" id="switch-3" method="POST" name="action" value="purple"></input>
                <input type="submit" class="switch-4" id="switch-4" method="POST" name="action" value="dark"></input>


                
                <!-- <input type="submit"> -->
                </form>
                </div>
                <script>
                  let switches = document.getElementsByClassName('switch');
                  for (let i of switches) {
                    i.addEventListener('click', function () {
                      let theme = this.dataset.theme;
                      let savedtheme = this.dataset.theme;
                      console.log(savedtheme);
                      setTheme(theme);
                      // THIS ARROW FUNCTION SHOWS THE THEME WHEN THE BUTTON IS CLICKED
                      let color = () => {
                        return theme;
                      } 
                      //alert("The current theme is: " + color());
                    });
                  }

                    function setTheme(theme) {
                    if (theme == 'light') {
                      document.getElementById('switcher-id').href = './themes/light.css';
                    } else if (theme == 'sky') {
                      document.getElementById('switcher-id').href = './themes/sky.css';
                    } else if (theme == 'purple') {
                      document.getElementById('switcher-id').href = './themes/purple.css';
                    } else if (theme == 'dark') {
                      document.getElementById('switcher-id').href = './themes/dark.css';
                    }
                    localStorage.setItem('style', theme);

                    }
                    
                  </script>
              </div>
            </div>
          </div>
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
          <script type="text/javascript" src="js/script.js"></script>
            
    </body>
</html>