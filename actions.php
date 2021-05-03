<?php
function getTheme($username) {
    require ('connect-db.php');
    $query = "SELECT * FROM settings WHERE username=:username";
    $statement = $db->prepare($query);
    $statement->bindParam(':username', $username);
    $statement->execute();
    $results = $statement -> fetchAll();
    $statement -> closecursor();
    return $results;
}