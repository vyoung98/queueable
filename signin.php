<?php
session_start();
require('connect-db.php');

if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_BCRYPT);

    $query = "SELECT hashed_password FROM users WHERE username = '$username'";

    $statement = $db->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll();
    
    echo $password;
    echo $results[0]['hashed_password'];
    if (!empty($results)){
        {
            echo "line 25!";
            //verify that the password matches the one in the table
          if (password_verify($password, $results[0]['hashed_password'])) 
          {
            session_start();
            echo "they match!";
            $_SESSION['user'] = $email;
            header("Location: index.php");
          } 
          else{
            echo "they do not match";
          }
        }
    }
      else{
        echo "nah u fuked up";
        $_SESSION['blank'] = "yes";
        header("Location: signup.php");
        }
}

?>