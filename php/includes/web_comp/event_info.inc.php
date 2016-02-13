<!-- The purpose of the section is to present information about the event -->
<section>
    <?php
        //Pasting a small booking section so user can book the event.
        include 'php/includes/web_comp/bookingevent_small_section.inc.php';
        //Getting some information about the query
        $fields = " evename, evedescr,
                    etypename, evedescr,
                    date, stime, ftime, noab, price,
                    venuename, address, town, country,
                    managerid, managerln, managerfn";
        $view = "search_n_event_view2";
        $query = "select $fields from $view where eveid = ?";

        $resultEvent = $mysqli->prepare($query);
        if($resultEvent == false)
        {
            echo "ops, something went wrong for the event";
            echo $resultEvents->error_list;
        }

        $resultEvent->bind_param('i', $_GET['eid']);
        $resultEvent->execute();
        $resultEvent->bind_result($evename, $evedescr,
                    $etypename, $evedescr,
                    $date, $stime, $ftime, $noab, $price,
                    $venuename, $address, $town, $country,
                    $managerid, $managerln, $managerfn);
        $resultEvent->fetch();
        $resultEvent->close();


    ?>
<div id="accordion">
	<h3> Name of the event</h3>
    <div>
        <?php echo $evename; ?>
    </div>
        <h3>Description</h3>
    <div>
<p>Type of Event: <?php echo $etypename; ?></p>
<h4>Description</h4>
<p> <?php echo $evedescr; ?> </p>
    </div>
        <h3>Event Location and Time </h3>
    <div>
        <p>Start time: <?php echo $stime; ?></p>
        <p>Finish time: <?php echo $ftime; ?></p>
        <h4>Location: </h4>
        <p>Town: <?php echo $town;?></p>
        <p>Country: <?php echo $country; ?></p>
        <p>Location: </p>
        <p><?php echo $address; ?></p>
    </div>
    <h3> Event's Manager </h3>
<div>
    <p> <?php echo "$managerfn  $managerln"; ?> </p>
</div>
</div><?php //Here is the end of the higher div?>

</section>
