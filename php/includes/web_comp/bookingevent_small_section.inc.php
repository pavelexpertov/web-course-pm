<div id="booking-seciton">
    <?php
        //The purpose of the section is to provide the funcitonality to
        //book an event depending on what user's session is

        //If the user is logged in
        if(isset($_SESSION['usr']))
        {
            //Make a query
            $query = "select ID from BookedEvents where eventid = ? and userid = ? and archived != 1";
            $stmt = $mysqli->prepare($query);
            if($stmt == false)
            {
                echo "Oooops, something has happened while making a stmt";
                exit();
            }
            $stmt->bind_param("ii", $_GET['eid'], $_SESSION['usr']->id);
            $stmt->execute();
            $stmt->store_result();
            //Gets a number of queries returned
            $booking_exist = $stmt->num_rows;
            if($booking_exist == 0) //If the booking doesn't exist
            {
                $link = "php/cms/insert/create_booked_event.php?eid={$_GET['eid']}";
                ?>
                    <a href="<?php echo $link; ?>">
                        Book the event
                    </a>
                <?php
            }//End of the inner if statement
            else {
                ?>
                You already booked the event
                <?php
            }//End of the inner else statement
        }
        else {//If the user is not logged in
            ?>

        <?php
    }//End of the outer if statement (else clause)



     ?>
</div>
