<?php
//The purpose of the file is to convert the usual date
//i.e. 12/01/1994 to 1994-01-12

function convertDate($date)
{
    $splitdate = explode("/", $date);
    $day = $splitdate[0];
    $year = $splitdate[2];
    $splitdate[0] = $year;
    $splitdate[2] = $day;
    print_r($splitdate);
    $newdate = implode("-",$splitdate);
    return $newdate;
}


 ?>
