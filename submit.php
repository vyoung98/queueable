<?php
session_start();
require('connect-db.php');

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$signup_time = $_POST['signup_time'];
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

//should probably check the username doesn't already exist

$query = "INSERT INTO users (username, hashed_password, signup_time) VALUES (:username, :hashed_password, :signup_time)";
$statement = $db->prepare($query);
$statement->bindValue(':username', $username);
$statement->bindValue(':hashed_password', $hashed_password);
$statement->bindValue(':signup_time', $signup_time);
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