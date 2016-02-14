<?php
//The purpose of the function is to go
//through a list of variables after they
//have been serialised and validated

//Checking if listOfVars exists or it contains some values
if(!isset($listOfVars) || count($listOfVars) == 0)
{
    echo "listOfVars is not set up or it doesn't have any variables!!!!!!";
    exit();
}

//Counter
$indexx = 0;
foreach($listOfVars as $var)
{
    if($var == false)
    {
        echo "found a variabled with false: $indexx <br>";
        print_r($listOfVars);
        exit();
    }
    $indexx++;
}

 ?>
