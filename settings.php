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
                <input id="new-game" type="text" placeholder="Enter Old Password" type="text"> <!-- need to put in a validation message if empty -->
                <p></p>
                <input id="new-game" type="text" placeholder="Enter New Password" type="text">
                <button class="btn btn-success" type="submit" onclick="">Change Password</button>
              </div>

              <div class="col">
                <h2>Email</h2>
                <input id="old-email" type="text" placeholder="Enter Old Email" type="text"> <!-- need to put in a validation message if empty -->
                <p></p>
                <input id="new-email" type="text" placeholder="Enter Email Again" type="text">
                <button class="btn btn-success" type="submit" onclick="">Change Email</button>
                <script>
                  //Update Email
                  var oldEmail=document.getElementById("old-email");
                  console.log("old-email");
                  var newEmail=document.getElementById("new-email");  
                  console.log("new-email");

                    var updEmail=function(){
                      console.log("Update email...");
                      if (newEmail.value || oldEmail.value == "") {
                        console.log("Error Validation Message");
                        alert("Please fill in the text box.");
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
    </body>
</html>