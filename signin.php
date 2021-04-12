<?php
session_start();
require('connect-db.php');

if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $passwordstr = $_POST['password'];
    $query = "SELECT hashed_password FROM users WHERE username = '$username'";

    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    
    if (!empty($results)){
        {
        echo "line 25!";
        //verify that the typed password matches the hashed password in the table
          if (password_verify($passwordstr, $results[0]['hashed_password'])) 
          {
            session_start();
            $_SESSION['user'] = $username;
            header("Location: home.php");
          } 
          else{
            echo "that is the wrong password";
          }
        }
    }
      else{
        echo "nah this account doesn't exist";
        $_SESSION['blank'] = "yes";
        header("Location: signup.php");
        }
}

?>