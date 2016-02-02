<div>
    <?php
        //The purpose of the section is to list user's booked events.

        //Creating a query
        $query = "select evename, evedate, usrid, beid, bedate, eventid
                  from bookedevent_view where usrid = {$_SESSION['usr']->id}";
        $stmt = $mysqli->query($query);
        $sumofqueries = mysqli_num_rows($stmt);
        if($sumofqueries > 0)
        {
            while($event = $stmt->fetch_assoc())
            {
            ?>

                <div>
                    <?php $evelink = "?eid={$event['eventid']}"; ?>
                    <h3>
                        <a href="event_info.php<?php echo $evelink;?>">
                            <?php echo $event['evename']; ?>
                        </a>
                    </h3>
                    <ul>
                        <li> Event's date: <?php echo $event['evedate']; ?> </li>
                        <li> Date of Booking: <?php echo $event['bedate']; ?> </li>
                    </ul>
                    <ul>
                        <?php $bevelink = "?eid={$event['beid']}"; ?>
                        <li>
                        <a href="php/cms/delete/delete_booked_event.inc.php<?php echo $bevelink; ?>">
                            Delete
                        </a>
                        </li>
                    </ul>
                </div>

            <?php
            }//End of the while loop
        }//End of the if statement
        else {
            ?>
            <p>Oooops, looks like you haven't created any events </p>
        <?php
        }//End of the else statement
     ?>
</div>
