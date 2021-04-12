<?php
session_start();
require('connect-db.php');

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

//should probably check the username doesn't already exist

$query = "INSERT INTO users (username, hashed_password) VALUES (:username, :hashed_password)";
$statement = $db->prepare($query);
$statement->bindValue(':username', $username);
$statement->bindValue(':hashed_password', $hashed_password);
$statement->execute();
$statement->closeCursor();

$query = "INSERT INTO settings (username, email, theme) VALUES (:username, :email, :theme)";
$statement = $db->prepare($query);
$statement->bindValue(':username', $username);
$statement->bindValue(':email', $email);
$statement->bindValue(':theme', "light");
$statement->execute();
$statement->closeCursor();

header("Location: login.php");

?>