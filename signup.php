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
      <div class="container">
        <div class="row">
            <div class="col-sm">    
                <div>
                    <h1>Signup</h1>
                    <h2>If you already have an account, <button type="submit" class="btn"><a href="login.php" style="color: white;">log in</a></button></h2>
                      <form id="signup" name="insert" action="submit.php" method="POST">
                        <div class="form-group">
                        <span class = "label">Username</span>
                          <input type="text" id="full_name" name="username" class="form-control" placeholder="Preferred Username" required>
                        </div>
                        <div class="form-group">
                        <span class = "label">Your Email</span>
                          <input type="text" id="email" name="email" class="form-control" placeholder="you@example.com" required>

                        </div>
                        <div class="form-group">
                            <span class = "label">Password</span>
                          <input type="password" id="password" name="password" class="form-control" placeholder="Create Password" required>
                        </div>
                        <div class="form-group">
                                <span class = "label">Re-enter Password</span>
                                <input type="password" id="re_password" class="form-control" placeholder="Confirm Password" required>
                        </div>
                        <input type="hidden" id="signup_time" name="signup_time" value= <?php $_SERVER['REQUEST_TIME']?>>

                        <div class="form-group text-center">
                          <input type="submit" name="submit" value="Create an Account" class="btn btn-primary py-3 px-5">
                        </div>

                        </form>
                    </div>
                </div>
              </div>
            </div>  
    </body>
    <?php include('./footer.php'); ?>
</html>