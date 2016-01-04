<?php
    require_once 'php/conn_sess/dbconn.inc.php';

    echo "Listen, the messages you get needs to be removed";
    echo "\nBecause you need to make this file get \n
        latest events rathen than pavelexpertov and what not";

    $query = "select * from Users";
    $result = $mysqli->query($query);

    $user = $result->fetch_assoc();
    echo "{$user['ID']}";
    echo "{$user['Username']}";
?>
