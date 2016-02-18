<?php
//This file is used to make a function that
//will take a result prepared statement and print
//info in the correct output using a loop.

function placeEventResult(&$queryResult)
{
    include_once 'php/data_format/convert_date.func.php';
    include_once 'php/data_format/truncate_time.func.php';
    include_once 'php/web_comp/button_element.func.php';
    $queryResult->bind_result($eveid, $name, $etype, $date, $stime, $ftime, $town, $country, $price);
    // echo "the result_events function has been called ";
    // $queryResult->bind_result($eveid, $name);
    $queryResult->store_result();
    $numRows = $queryResult->num_rows;
     echo "Number of results is $numRows";

    while($queryResult->fetch()) {
?>

<div class='eventresult'>
    <h3>
        <?php $elink = "event_info.php?eid=$eveid"; ?>
        <?php echo $name; ?>
    </h3>

    <ul>
        <li> Event Type: <?php echo $etype;?> </li>
        <li> Date: <?php echo convertIsoDate($date);?> </li>
        <li> Start Time: <?php echo truncateTime($stime);?> </li>
        <li> Finish Time: <?php echo truncateTime($ftime); ?> </li>
        <li> Location: <?php echo $town . ", " . $country; ?> </li>
    </ul>
    <?php placeButton("More Info", $elink);?>
</div>

<?php
 } //End of the while loop
} //The end of the placeEventResult function
?>
