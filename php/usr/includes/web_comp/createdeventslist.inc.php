<!-- This is a section to contain necessary stuff for cruding created events. -->
<div id="tabs-1">
<h2>List Of Your Created Events</h2>
  <h3><a href="create_event.php"> Create new event</a></h3>
<?php
    include 'php/data_format/truncate_time.func.php';
    include 'php/data_format/convert_date.func.php';
    include 'php/web_comp/button_element.func.php';
    //The purpose of the page is to print events created by the registered user
    //Create a query
    if($_SESSION['usr']->eveadmin != 2)
    {
    $query = "select eveid, evename, date, stime,
                ftime, etypename
                from search_n_event_view2
                where managerid = {$_SESSION['usr']->id}";
    }
    else {
    $query = "select eveid, evename, date, stime,
                ftime, etypename
                from search_n_event_view2";
    }
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
                <li> <?php echo convertIsoDate($event['date']); ?> </li>
                <li>Start Time: <?php echo truncateTime($event['stime']); ?> </li>
                <li>Finish Time: <?php echo truncateTime($event['ftime']); ?> </li>
                <li>Type Of Event: <?php echo $event['etypename']; ?> </li>
            </ul>
            <?php
                $elink = "edit_createdevent.php?eid={$event['eveid']}";
                $dlink = "php/cms/delete/delete_created_event.inc.php?eid={$event['eveid']}";
                placeButton("Edit", $elink);
                placeButton("Delete", $dlink);
             ?>
        </div>
    <?php }    //End of the while looop
    } //End of the if statement block
    else { ?>
        <p>Ooops, looks like you haven't created any events </p>
<?php }//End of the else clause ?>
</div>
