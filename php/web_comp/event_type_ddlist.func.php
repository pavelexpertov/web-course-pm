<?php
//The purpose of the function is to print out
//a drop down list that will contain event type's info and id

//Creating an associative array of data in an array
function placeDDEventTypes($ddname, $selectedVenue = false){
    include 'php/conn_sess/dbconn.inc.php';
    $listOfET = array();
    $query = "select ID, Name from EventTypes where Archived = 0 and ManagerID is not null";
    $stmt = $mysqli->query($query);

    while($et = $stmt->fetch_assoc())
    {
        $evt = array("name"=>$et['Name'],
                        "id"=>$et['ID']);
        $listOfET[] = $evt;
    }


        print_r($listOfET);


    //Placing the drop down list
    ?>
<select id="<?php echo $ddname;?>" name="<?php echo $ddname;?>">
    <?php
    foreach($listOfET as $et)
    {
        $info = "{$et['name']}";
        if($selectedVenue != false && $et['id'] == $selectedVenue)
        {
        ?>
        <option value="<?php echo $et['id'];?>" selected> <?php echo $info; ?> </option>

        <?php
        }//End of the if clause
        else
        {
            ?>
        <option value="<?php echo $et['id'];?>"> <?php echo $info; ?> </option>
            <?php
        }//End of the else clause
    }//End of the foreach loop
    ?>
</select>
    <?php
}//End of the function placeDDVenue
 ?>
