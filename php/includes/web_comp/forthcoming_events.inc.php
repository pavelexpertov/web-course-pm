<aside id="forthcoming_events">
<!-- The purpose of this page is to display
closest events (displaying their names, dates
and locations) -->

<h3> Forthcoming Events </h3>

    <?php
        include_once 'php/data_format/truncate_time.func.php';
        include_once 'php/data_format/convert_date.func.php';
        include_once 'php/web_comp/button_element.func.php';

        $queryEarlyEvents = "select id, ename, date, time,
                            town, country
                            from forthcoming_events";
        $resultEarlyEvents = $mysqli->query($queryEarlyEvents);
    ?>

    <?php
        while($event = $resultEarlyEvents->fetch_assoc()){
    ?>
    <div class="forth_events">
        <ul>
            <li><?php echo $event['ename'];   ?> </li>
            <li><?php echo convertIsoDate($event['date']);   ?> </li>
            <li>Starts at <?php echo truncateTime($event['time']);   ?> </li>
            <li><?php echo $event['town'];    ?></li>
            <li><?php echo $event['country'];    ?></li>
        </ul>
        <?php
        $link = "event_info.php?eid={$event['id']}";
        placeButton("Check it out", $link);
         ?>
    </div>
    <?php }//End of the while loop?>
</aside>
