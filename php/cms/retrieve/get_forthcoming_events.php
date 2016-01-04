<?php
// This include retrieves top 5 early events from the database
    require_once 'php/conn_sess/dbconn.inc.php';

    // echo "Listen, the messages you get needs to be removed";
    // echo "\nBecause you need to make this file get \n
    //     latest events rathen than pavelexpertov and what not";

    //  $query = "select ID, Username from Users";
    //  $result = $mysqli->query($query);
     //
    //  $user = $result->fetch_assoc();
    //  echo "{$user['ID']}";
    //  echo "{$user['Username']}";

    /*$queryEarlyEvents = "select ID, Name, Date, VenueID
                        from Events order by Date
                        limit 10";
    $resultEarlyEvents = $mysqli->query($queryEarlyEvents);*/

    $queryEarlyEvents = "select name from forth";
    $resultEarlyEvents = $mysqli->query($queryEarlyEvents);
    $event = $resultEarlyEvents->fetch_assoc();
    echo $event['name'];


?>
