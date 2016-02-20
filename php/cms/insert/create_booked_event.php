<?php
    //The purpose of the file is to make a logic for
    //making a booking for the event if either:
    //--booking already exists (just toggle the flag off)
    //--making a new booking (just insert into the database)

    include '../../web_comp/place_sess_db_include.func.php';
    $includes = placeSDIncludes(2, true);
    foreach($includes as $include)
        include $include;

    $eveid = checkInt($_GET['eid']);
    $listOfVars = array($eveid);
    include 'php/cms/verifydata/check_for_false_vars.inc.php';

    //Making a query
    $query = "select ID from BookedEvents where eventid = ? and userid = ?";
    $stmt = $mysqli->prepare($query);
    if($stmt == false)
    {
        echo "Oooops, something has happened while making a stmt";
        exit();
    }
    $stmt->bind_param("ii", $eveid, $_SESSION['usr']->id);
    $stmt->execute();
    $stmt->store_result();
    //Gets a number of queries returned
    $booking_exist = $stmt->num_rows;

    //If the booking exists
    if($booking_exist > 0)
    {
        //Get the booking's id
        $stmt->bind_result($bookedid);
        $stmt->fetch();
        $stmt->close();
        //Testing: to see if it managed to get the bookedid
        //echo $bookedid;
        //Create today's date for the booking in the correct format
        $cdate = date("Y-m-d");
        //Make a new query to toggle the flag off
        $query = "update BookedEvents set archived = 0, bookingdate = ? where ID = ?";
        $stmt = $mysqli->prepare($query);
        //echo $stmt;
        if($stmt == false)
        {
            echo "Ooops an error has happened inside an if clause of updating the booking archived and bookeddate ";
            echo $mysqli->error;
        }
        $stmt->bind_param("si", $cdate, $bookedid);
        $stmt->execute();
        $stmt->close();
        //echo $mysqli->error;
        //$stmt->close();
    }
    else { //if the booking doesn't exist
        $stmt->close();
        //Create today's date for the booking in the correct format
        $cdate = date("Y-m-d");
        $query = "insert into BookedEvents values(0, $eveid, {$_SESSION['usr']->id}, $cdate, 0)";
        $stmt=$mysqli->prepare($query);
        if($stmt == false)
        {
            echo "Ooops an error has happened inside an else clause of inserting the booking";
            echo $mysqli->error;
        }
        $stmt->bind_param("iis", $eveid, $_SESSION['usr']->id, $cdate);
        $stmt->execute();
        $stmt->close();
        //echo $mysqli->error;

        //$stmt->close();
    }

    //Return the user back
    header("Location: ../../../usr_page.php");
    exit();

 ?>
