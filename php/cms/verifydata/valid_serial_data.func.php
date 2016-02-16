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

function checkTimings($stime, $ftime)
{
    //Checking to make sure stime is before ftime or not the same
    //First check if one of them is not passed as false
    if($stime == false || $ftime == false)
    {   //return false
        return false;
    }
    //converting time to minutes format of time is hh:mm
    $astime = explode(":",$stime);
    $aftime = explode(":",$ftime);

    $stmin = ($astime[0] * 60) + $astime[1]; //Start time
    $ftmin = ($aftime[0] * 60) + $aftime[1]; //Finish time
    if($stmin < $ftmin)
        return true;
    else
        return false;
}

function checkPassword($pwd)
{
    /*The passwords first character must be a letter, it must contain
    at least 4 characters adn no more than 15 characters and no characters other
    than letters, numbers adn teh underscore may be used*/
    if(preg_match("#^[a-zA-Z]\w{3,14}$#", $pwd))
        return $pwd;
    else
        return false;
}
 ?>
