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
    //print_r($splitdate);
    $newdate = implode("-",$splitdate);
    return $newdate;
}

//The purpose of the convertIsoDate is to conver the standard
//date to normal i.e. 1994-01-12 to 12/01/1994

function convertIsoDate($date)
{
    $splitdate = explode("-", $date);
    $day = $splitdate[2];
    $year = $splitdate[0];
    $splitdate[0] = $day;
    $splitdate[2] = $year;
    $newdate = implode("/", $splitdate);
    return $newdate;
}


 ?>
