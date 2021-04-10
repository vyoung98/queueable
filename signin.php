<?php
session_start();
require('connect-db.php');

if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT hashed_password FROM users WHERE username = '$username'";

    $statement = $db->prepare($query); 
    $statement->execute();
    $results = $statement->fetchAll();
    return $results;

    print(":username");
    print("hashed_password");
    
    if (!empty($results))
        {
            //verify that the password matches the one in the table
          if (password_verify($_POST['password'], $results[0]['password'])) 
          {
            session_start();
            $_SESSION['user'] = $email;
            header("Location: index.php");
          } 
        }
      else{
        $_SESSION['blank'] = "yes";
        header("Location: signup.php");
      }
    }
?>