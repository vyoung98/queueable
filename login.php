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
      <?php include('header.html')?>

                
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
        <form action="login.php" method="post"> <!-- use action to send the form submission somewhere and use method to specify how the form data is packaged -->
        
        Username: <input type="text" name="name" required /> <br/>
        Password: <input type="password" name="pwd" required /> <br/>
        <input type = "hidden" name = "attempt" value="<?php if (isset($_GET['attempt'])) echo $_GET['attempt']?>" />
        <input type="submit" value="Submit" class="btn btn-secondary" 
            <?php if ($number_attempt >=3) { ?> disabled <?php } ?>
            />
        </form>
        <span class="msg"<?php if(isset($_GET['msg'])) echo $_GET['msg'] ?> </span>
    </div>
    </body>
</html>