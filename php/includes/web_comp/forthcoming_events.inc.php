<aside id="forthcoming_events">
<!-- The purpose of this page is to display
closes events (displaying their names, dates
and locations) -->

    <?php
        //Getting conection to the database
        require_once 'php/conn_sess/dbconn.inc.php';

        $queryEarlyEvents = "select ename, date, time,
                            town, country
                            from forthcoming_events";
        $resultEarlyEvents = $mysqli->query($queryEarlyEvents);
    ?>

    <?php
        while($event = $resultEarlyEvents->fetch_assoc()){
    ?>
    <div class="forth_events">
        <ul>
            <li> <?php echo $event['ename']   ?> </li>
            <li> <?php echo $event['date']   ?> </li>
            <li> <?php echo $event['time']   ?> </li>
            <li> <?php echo $event['town']    ?></li>
            <li> <?php echo $event['country']    ?></li>
        </ul>
    </div>
    <?php }//End of the while loop?>
</aside>
