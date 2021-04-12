<?php
session_start();
require('connect-db.php');

$email = $_POST['newEmail'];
$username = $_SESSION['user'];
echo $username;
echo $email;
$query = "UPDATE settings SET email=:email WHERE username=:username";
$statement = $db->prepare($query);
$statement->bindValue(':email', $email);
$statement->bindValue(':username', $username);
$statement->execute();
$statement->closeCursor();

header("Location: login.php");

?>