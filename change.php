<?php
session_start();
require('connect-db.php');

$password = $_POST['newPassword'];
$hashed_password = password_hash($password, PASSWORD_BCRYPT);
$username = $_SESSION['user'];
echo $username;
echo $hashed_password;
$query = "UPDATE users SET hashed_password=:hashed_password WHERE username=:username";
$statement = $db->prepare($query);
$statement->bindValue(':hashed_password', $hashed_password);
$statement->bindValue(':username', $username);
$statement->execute();
$statement->closeCursor();

header("Location: login.php");

?>