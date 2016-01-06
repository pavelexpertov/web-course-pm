<?php
//This file is used to make a function that
//will take a result prepared statement and print
//info in the correct output using a loop.

function placeEventResult(&$queryResult)
{
    $queryResult->bind_result($eveid, $name, $etype, $date, $stime, $ftime, $town, $country, $price);
    echo "the result_events function has been called ";
    // $queryResult->bind_result($eveid, $name);

    while($queryResult->fetch()) {
        echo "reached the while loop";
?>

<div class='eventresult'>
    <h3>
        <?php echo $name; ?>
    </h3>

    <ul>
        <li> Event Type: <?php echo $etype?> </li>
        <li> Date: <?php echo $date?> </li>
        <li> Start Time: <?php echo $stime?> </li>
        <li> Finish Time: <?php echo $ftime ?> </li>
        <li> Location: <?php echo $town . ", " . $country ?> </li>
        <li> Price: <?php echo $price ?> </li>
    </ul>
</div>

<?php
 } //End of the while loop
} //The end of the placeEventResult function
?>
