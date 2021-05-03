<?php
session_start();
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');

header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');

//size of data
$content_length = (int) $_SERVER['CONTENT_LENGTH'];

//retrieve data
$postdata = file_get_contents("php://input");

//extract
$request = json_decode($postdata);

$data = [];
$data[0]['length'] = $content_length;
foreach ($request as $k => $v) {
    $temp = "$k => $v";
    $data[0]['gcp_post_'.$k] = $v;
}

//base function
function addFriend($name, $email, $f_name, $f_email) {
    require('connect-db.php');
    $query = "INSERT INTO friends (name, email, f_name, f_email) VALUES (:name, :email, :f_name, :f_email)";

    $statement = $db -> prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':f_name', $f_name);
    $statement->bindValue(':f_email', $f_email);
    $statement->execute();
    $statement->closeCursor();
}

echo json_encode(['content'=>$data, 'response_on'=> $current_date]);
?>