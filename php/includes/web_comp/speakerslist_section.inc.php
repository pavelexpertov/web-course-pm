<section>
<?php
    //This page is used to retrieve data from the server
    //and then print them in a certain format on this page

    require_once 'php/conn_sess/dbconn.inc.php';

    //Creating a query
    $query = "select id, fname, lname from speakers_list";
    $resultSpeakersList = $mysqli->query($query);

    //Outputing data

    while($speaker = $resultSpeakersList->fetch_assoc())
    {
 ?>
        <div class="speaker-box">
            <h3><?php echo $speaker['fname'] . " " . $speaker['lname']; ?> </h3>
        </div>
    <?php
    } //End of the while loop ?>
</section>
