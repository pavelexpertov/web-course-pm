<section>
    <?php
    include_once 'php/cms/verifydata/valid_serial_data.func.php';
    $id = checkInt($_GET['id']);
    $listOfVars = array($id);
    include_once 'php/cms/verifydata/check_for_false_vars.inc.php';

    //$query = "select fname, lname, job, descr from speaker_info where id = ?";
    $query = "select FirstName, LastName, CurrentJob, Description from Users where ID = ? and EventAdmin = 1";
    $result = $mysqli->prepare($query);

    if($result == false)
    { //Just to check errors
        echo "False false false";
        echo $result->error_list;
    }

    $result->bind_param('i', $id);
    $result->execute();
    $result->bind_result($fname, $lname, $job, $descr);
    $result->fetch();
    $result->close();
    ?>

    <h1><?php echo "$fname" . " " . "$lname"; ?></h1>
    <p>Current job: <?php echo "$job"; ?> </p>
    <h1>Description</h1>
    <p><?php echo "$descr"; ?> </p>
</section>
