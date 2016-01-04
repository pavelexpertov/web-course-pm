<section>
    <?php
    $query = "select fname, lname, job, descr from speaker_info where id = ?";
    $result = $mysqli->prepare($query);

    if($result == false)
    { //Just to check errors
        echo "False false false";
        echo $result->error_list;
    }

    $result->bind_param('i', $_GET['id']);
    $result->execute();
    $result->bind_result($fname, $lname, $job, $desc);
    $result->fetch();
    $result->close();


    ?>
</section>
