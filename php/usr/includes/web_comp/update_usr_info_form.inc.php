<?php
    //The purpose of the file is to update user's information
    include 'php/web_comp/button_element.func.php';

    $query = "select FirstName, LastName, CurrentJob, EventAdmin, Description
                from Users where ID = ?";
    $stmt = $mysqli->prepare($query);
    if($stmt == false)
    {
        echo "query error happened";
        exit();
    }
    $stmt->bind_param("i", $_SESSION['usr']->id);
    $stmt->execute();
    $stmt->bind_result($fname, $lname, $job, $eveadmin, $descr);
    $stmt->fetch();
    $stmt->close();
 ?>
<form id="update-info" action="php/cms/update/update_usr_info.php" method="post">
    <fieldset>
        <legend>Change your personal information</legend>
    <label for="fname">First Name</label>
    <input type="text" name="fname" id="fname" value="<?php echo $fname;?>">
    <br>
    <label for="lname">Surname</label>
    <input type="text" name="lname" id="lname" value="<?php echo $lname;?>">
    <br>
    <label for="job">Job title</label>
    <input type="text" name="job" id="job" value="<?php echo $job;?>">
    <br>
    <input type="checkbox" name="bio_cbx" id="bio_cbx" <?php if($eveadmin == 1) echo "checked";?>>
    <label for="bio_cbx">Check if you are an event manager and then fill in the box</label>
    <br>
    <br>
    <label>Edit your biography</label>
    <br>
    <textarea id="biodesc" name="biodesc"><?php echo $descr;?></textarea>
    <br>
    <br>
    <label for="pwd">Enter your password to confirm changes</label>
    <br>
    <input type="text" name="pwd" id="pwd">
    <br>
    <input type="submit" value="Save Changes">
    <?php placeButton("Cancel", "usr_page.php");?>
    <br>
    <fieldset>
</form>
