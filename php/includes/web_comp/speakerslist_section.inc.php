<section>
<?php
    //This page is used to retrieve data from the server
    //and then print them in a certain format on this page

    require_once 'php/conn_sess/dbconn.inc.php';

    //Creating a query
    $query = "select ID, FirstName, LastName from Users where EventAdmin = 1";
    $resultSpeakersList = $mysqli->query($query);

    //Outputing data

    while($speaker = $resultSpeakersList->fetch_assoc())
    {
        $link = "'speaker_info.php?id=" . "{$speaker['ID']}'";
 ?>
        <div class="speaker-box">
            <h3>
            <a href= <?php echo $link; ?>>
            <?php
            echo $speaker['FirstName'] . " " . $speaker['LastName'];
            ?>
            </a>
            </h3>
        </div>
    <?php
    } //End of the while loop ?>
</section>
