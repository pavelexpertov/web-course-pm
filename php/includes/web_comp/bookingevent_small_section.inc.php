<div id="booking-seciton">
    <?php
        //The purpose of the section is to provide the funcitonality to
        //book an event depending on what user's session is
        //Necessary validation functions
        include_once 'php/cms/verifydata/valid_serial_data.func.php';
        include_once 'php/web_comp/button_element.func.php';

        //If the user is logged in
        if(isset($_SESSION['usr']))
        {
            $eveid = checkInt($_GET['eid']);
            $listOfVars = array($eveid);
            include 'php/cms/verifydata/check_for_false_vars.inc.php';

            //Make a query
            $query = "select ID from BookedEvents where eventid = ? and userid = ? and archived != 1";
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
            if($booking_exist == 0) //If the booking doesn't exist
            {
                $link = "php/cms/insert/create_booked_event.php?eid=$eveid";
                placeButton("Book the event", $link);
            }//End of the inner if statement
            else {
                ?>
                <h3>You already booked the event</h3>
                <?php
            }//End of the inner else statement
        }
        else {//If the user is not logged in
            ?>
            <p>You need to be logged in to book the event.</p>
        <?php
            placeButton("Log in", "login.php");
    }//End of the outer if statement (else clause)



     ?>
</div>
