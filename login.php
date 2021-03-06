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
      <?php include('navbar.php')?>


    <?php
    $number_attempt = null;
    if (isset($_GET['attempt'])) {
        echo "number_attempt = " . $_GET['attempt'] . "<br/>";
        $number_attempt = intval($_GET['attempt']);
        if ($number_attempt >=3) {
        echo "Please contact the admin <br/>";
        }
    }
    else {
        $number_attempt = 0;
    }
    ?>
      <div class="container">
        <div class="row">
            <div class="col-sm">    
                <div>
                    <h1>Login</h1>
                    <h2>If you don't have an account, <button type="submit" class="btn"><a href="signup.php" style="color: white;">sign up</a></button></h2>
                      <form id="login" name="insert" action="signin.php" method="POST">
                        <div class="form-group">
                        <span class = "label">Username</span>
                          <input type="text" id="full_name" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <span class = "label">Password</span>
                          <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group text-center">
                          <input type="submit" name="submit" value="Login" class="btn btn-primary py-3 px-5">
                        </div>

                        </form>
                    </div>
                </div>
              </div>
            </div>  
    </body>
    <?php include('./footer.php'); ?>
</html>