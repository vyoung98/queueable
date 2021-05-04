<?php
session_start();
require('connect-db.php');

$email = $_POST['newEmail'];
$username = $_SESSION['user'];
$query = "UPDATE settings SET email=:email WHERE username=:username";
$statement = $db->prepare($query);
$statement->bindValue(':email', $email);
$statement->bindValue(':username', $username);
$statement->execute();
$statement->closeCursor();

echo "<script>
    alert('Email Changed');
    window.location.href='home.php';
    </script>";
?>