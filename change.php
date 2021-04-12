<?php
session_start();
require('connect-db.php');

$password = $_POST['newPassword'];
$hashed_password = password_hash($password, PASSWORD_BCRYPT);
$username = $_SESSION['user'];
echo $username;
$query = "UPDATE users SET password='$hashed_password' WHERE username='$username'";
$statement = $db->prepare($query);
$statement->bindValue('hashed_password', $hashed_password);
$statement->execute();
$statement->closeCursor();

?>