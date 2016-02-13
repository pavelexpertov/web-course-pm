<?php
//The purpose of the function is to print out
//a drop down list that will contain venue's info and id

//Creating an associative array of data in an array
function placeDDVenues($ddname, $selectedVenue = false){
    include 'php/conn_sess/dbconn.inc.php';
    $listOfVenues = array();
    $query = "select ID, Name, Town, Country
              from Venues where Archived = 0 and ManagerID is not null";
    $stmt = $mysqli->query($query);

    while($v = $stmt->fetch_assoc())
    {
        $venue = array("name"=>$v['Name'],
                        "id"=>$v['ID'],
                        "town"=>$v['Town'],
                        "country"=>$v['Country']);
        $listOfVenues[] = $venue;
    }


        //print_r($listOfVenues);


    //Placing the drop down list
    ?>
<select id="<?php echo $ddname;?>" name="<?php echo $ddname;?>">
    <?php
    foreach($listOfVenues as $v)
    {
        $info = "Name: {$v['name']}, Town: {$v['town']}, Country: {$v['country']}";
        if($selectedVenue != false && $v['id'] == $selectedVenue)
        {
        ?>
        <option value="<?php echo $v['id'];?>" selected> <?php echo $info; ?> </option>

        <?php
        }//End of the if clause
        else
        {
            ?>
        <option value="<?php echo $v['id'];?>"> <?php echo $info; ?> </option>
            <?php
        }//End of the else clause
    }//End of the foreach loop
    ?>
</select>
    <?php
}//End of the function placeDDVenue
 ?>
