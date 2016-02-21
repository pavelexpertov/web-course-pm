<div id="tabs-2">
<h2>List of Bookings</h2>
    <?php
        //The purpose of the section is to list user's booked events.
        include_once 'php/web_comp/button_element.func.php';
        include_once 'php/data_format/convert_date.func.php';

        //Creating a query
        if($_SESSION['usr']->eveadmin != 2)
        {
        $query = "select evename, evedate, usrid, beid, bedate, eventid
                  from bookedevent_view where usrid = {$_SESSION['usr']->id}";
      }
      else
      {
        $query = "select evename, evedate, usrid, beid, bedate, eventid
                  from bookedevent_view";
          }
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
                        <li> Event's date: <?php echo convertIsoDate($event['evedate']); ?> </li>
                        <li> Date of Booking: <?php echo convertIsoDate($event['bedate']); ?> </li>
                    </ul>
                    <?php
        $bdlink = "php/cms/delete/delete_booked_event.inc.php?eid={$event['beid']}";
        placeButton("Delete", $bdlink);
                     ?>
                </div>

            <?php
            }//End of the while loop
        }//End of the if statement
        else {
            ?>
            <p>Oooops, looks like you haven't made any bookings. </p>
        <?php
        }//End of the else statement
     ?>
</div>
