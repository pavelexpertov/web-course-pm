<!-- The purpose of the section is to present information about the event -->
<section>
    <?php
        //including necessary validation and editing functions
        //require 'php/cms/verifydata/valid_serial_data.func.php';
        include 'php/data_format/convert_date.func.php';
        include 'php/data_format/truncate_time.func.php';
        //Pasting a small booking section so user can book the event.
        include 'php/includes/web_comp/bookingevent_small_section.inc.php';
        //Getting some information about the query

        //Checking the data request from user
        $eveid = checkInt($_GET['eid']);
        $listOfVars = array($eveid);
        include 'php/cms/verifydata/check_for_false_vars.inc.php';

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

        $resultEvent->bind_param('i', $eveid);
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
        <p>Date: <?php echo convertIsoDate($date); ?></p>
        <p>Start time: <?php echo truncateTime($stime); ?></p>
        <p>Finish time: <?php echo truncateTime($ftime); ?></p>
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
