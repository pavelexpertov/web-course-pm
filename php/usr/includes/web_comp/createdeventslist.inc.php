<!-- This is a section to contain necessary stuff for cruding created events. -->
<div id="tabs-1">
<h2>List Of Your Created Events</h2>
  <h3><a href="create_event.php"> Create new event</a></h3>
<?php
    //The purpose of the page is to print events created by the registered user
    //Create a query
    $query = "select eveid, evename, date, stime,
                ftime, etypename
                from search_n_event_view2
                where managerid = {$_SESSION['usr']->id}";
    $stmt = $mysqli->query($query);
    //Getting a number of returned queries
    $numberOfQueries = mysqli_num_rows($stmt);

    if($numberOfQueries != 0)
    {
        while($event = $stmt->fetch_assoc())
        {
    ?>
        <div>
            <h3> <?php echo $event['evename']; ?> </h3>
            <ul>
                <li> <?php echo $event['date'] ?> </li>
                <li>Start Time: <?php echo $event['stime'] ?> </li>
                <li>Finish Time: <?php echo $event['ftime'] ?> </li>
                <li>Type Of Event: <?php echo $event['etypename'] ?> </li>
            </ul>

            <ul>
                <?php
                    //Making a link to edit page with event's id
                $elink = "edit_createdevent.php?eid={$event['eveid']}";
                 ?>
                <li><a href="<?php echo $elink; ?>"> Edit </a></li>
                <?php
                    //Making a link to delte page with event's id
                $dlink = "php/cms/delete/delete_created_event.inc.php?eid={$event['eveid']}";
                 ?>
                <li><a href="<?php echo $dlink; ?>"> Delete </a></li>
            </ul>

        </div>
    <?php }    //End of the while looop
    } //End of the if statement block
    else { ?>
        <p>Ooops, looks like you haven't created any events </p>
<?php }//End of the else clause ?>
</div>
