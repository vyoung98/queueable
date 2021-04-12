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

    <body>
          <?php include('header.html')?>

          <div class="container">
            <div class="row">
            <div class="col">
                <h2>Password</h2>
                <input id="currentPassword" name="currentPassword" type="password" placeholder="Enter Current Password" type="text" class="required"> <!-- need to put in a validation message if empty -->
                <p></p>
                <input id="newPassword" name="newPassword" type="password" placeholder="Enter New Password" type="text" class="required">
                <p></p>
                <input id="confirmPassword" name="confirmPassword" type="password" placeholder="Confirm New Password" type="text" class="required">
                <button class="btn btn-success" type="submit" onclick="">Change Password</button>
              </div>

              <div class="col">
                <h2>Email</h2>
                <input id="old-email" type="text" placeholder="Enter Old Email" class="required"> <!-- need to put in a validation message if empty -->
                <p></p>
                <input id="new-email" type="text" placeholder="Enter Email Again" class="required">
                <p></p>
                <input id="confirm-email" type="text" placeholder="Confirm New Email" class="required">
                <button class="btn btn-success" type="submit" onclick="">Change Email</button>
                <script>
                
                  //Update Email
                  var oldEmail=document.getElementById("old-email");
                  console.log("old-email");
                  var newEmail=document.getElementById("new-email");  
                  console.log("new-email");
                  var confirmEmail=document.getElementById("confirm-email");
                  console.log("confirm-email");

                    var updEmail=function(){
                      console.log("Update email...");
                      if (newEmail.value || oldEmail.value == "") {
                        console.log("Error Validation Message");
                        alert("Please fill in the text box.");
                        return false;
                      }
                      //check if email matches confirmed email
                      else if (newEmail.value != confirmEmail.value) {
                        console.log("Emails do not match");
                        alert("Please make sure your emails match.");
                        return false;
                      }
                      else{
                        // check that oldEmail matches the database
                        if (oldEmail.value){
                          // update the newEmail in the database
                          alert("Successfully updated email!");
                          console.log("Update email...");
                        }
                        passInput.value="";
                      }

                    }
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
                <div data-theme="light" class="switch" id="switch-1"></div>
                <div data-theme="sky" class="switch" id="switch-2"></div>
                <div data-theme="purple" class="switch" id="switch-3"></div>
                <div data-theme="dark" class="switch" id="switch-4"></div>
                </div>
                <script>
                  let switches = document.getElementsByClassName('switch');
                  let style = sessionStorage.getItem('style');
                  if (style == null) {
                    setTheme('light');
                  } else {
                    setTheme(style);
                  }

                  for (let i of switches) {
                    i.addEventListener('click', function () {
                      let theme = this.dataset.theme;
                      setTheme(theme);
                      // THIS ARROW FUNCTION SHOWS THE THEME WHEN THE BUTTON IS CLICKED
                      let color = () => {
                        return theme;
                      } 
                      alert("The current theme is: " + color());
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
                    sessionStorage.setItem('style', theme);

                    }
                    
                  </script>
              </div>
            </div>
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

          

            <?php

            $_SESSION["userId"] = "9";
            $conn = mysqli_connect("localhost", "root", "test", "blog_samples") or die("Connection Error: " . mysqli_error($conn));

            if (count($_POST) > 0) {
                $result = mysqli_query($conn, "SELECT *from users WHERE userId='" . $_SESSION["userId"] . "'");
                $row = mysqli_fetch_array($result);
                if ($_POST["currentPassword"] == $row["password"]) {
                    mysqli_query($conn, "UPDATE users set password='" . $_POST["newPassword"] . "' WHERE userId='" . $_SESSION["userId"] . "'");
                    $message = "Password Changed";
                } else
                    $message = "Current Password is not correct";
            }
            ?>
    </body>
</html>