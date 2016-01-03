<?php
    require_once 'php/conn_sess/dbconn.inc.php';


    $query = "select * from Users";
    $result = $mysqli->query($query);

    $user = $result->fetch_assoc();
    echo "{$user['ID']}";
    echo "{$user['Username']}";
?>
