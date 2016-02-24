<?php
//The purpose of the function is to place
// a drop down list that will be used in
//the forms. Also it will be able to
//select a particular time when editing
//something.

function placeDDTime($ddname, $selectedTime = false)
{
    //Generate a list of times
    //time list
    $timeList = array();
    for($hour = 8; $hour < 24; $hour++)
    {
        //String version of hour
        $shour = "";
        if($hour < 10)
            $shour = "0$hour";
        else
            $shour = "$hour";

        for($min=0; $min < 2; $min++)
        {
            $time = "";
            if($min == 0)
                $time = "$shour:00";
            elseif($min == 1)
                $time = "$shour:30";
            $timeList[] = $time;
        }
    }

    /*foreach($timeList as $time)
    {
        echo "<br>";
        echo "$time";
    }*/

    //Placing the drop down list now
    ?>
<select id="<?php echo $ddname;?>" name="<?php echo $ddname;?>">

    <?php
        foreach($timeList as $time)
        {
            if($selectedTime != false && $time == $selectedTime)
            {
            ?>
<option value="<?php echo $time;?>" selected> <?php echo $time; ?> </option>
        <?php
            }//End of the first if clause
            else
            {
                ?>
<option value="<?php echo $time;?>"> <?php echo $time; ?> </option>
                <?php
            }//End of the else clause
        }//End of the foreach loop
     ?>
</select>

    <?php
}//End of the function of placeDDTime


 ?>
