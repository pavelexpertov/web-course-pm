<?php
//The purpose of the file is to contain functions that
//will check user input by first serialising it and then
//validate it.

function checkInt($number)
{
    $num = filter_var($number, FILTER_SANITIZE_NUMBER_INT);
    return filter_var($num, FILTER_VALIDATE_INT);
}

function checkString($string)
{
    $s = filter_var($string, FILTER_SANITIZE_STRING);
    return $s;
}

function checkDateF($date)
{
    if(preg_match("#^(0[1-9]|[1-2][0-9]|3[0-1])/(0[1-9]|1[0-2])/[0-9]{4}$#", $date))
        return $date;
    else
        return false;
}

function checkTime($time)
{
    //This function checks if time is in hh:mm format
    //if(preg_match("#^(\d{2}):(\d{2})$#", $time))
    if(preg_match("#^(0[0-9]|1[0-9]|2[0-3]):(00|30)$#", $time))
        return $time;
    else
        return false;
}

 ?>
