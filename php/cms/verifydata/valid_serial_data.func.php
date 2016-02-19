<?php
//The purpose of the file is to contain functions that
//will check user input by first serialising it and then
//validate it.

function checkInt($number)
{
    $num = filter_var($number, FILTER_SANITIZE_NUMBER_INT);
    return filter_var($num, FILTER_VALIDATE_INT);
}

function checkString($string, $length = false)
{
    $s = filter_var($string, FILTER_SANITIZE_STRING);
    if($length != false)
    {
        if($length >= strlen($s))
            return $s;
        else
            return false;
    }
    return $s;
}

function checkDateF($date)
{
    //The date is in format of dd/mm/yyyy
    if(!preg_match("#^(0[1-9]|[1-2][0-9]|3[0-1])/(0[1-9]|1[0-2])/[0-9]{4}$#", $date))
        return false;
    $d = explode("/", $date);
    if(checkdate($d[1], $d[0], $d[2]))
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

function arePasswordsEqual($p1, $p2)
{
    if($p1 == false || $p2 == false)
        return false;
    if($p1 == $p2)
        return true;
    else
        return false;
}

function checkUsername($usrname)
{
    //Checking username if the first letter is alphabetic
    //and the length is between 1 and 25 characters
    if(preg_match("#^[a-zA-Z]\w{1,24}$#", $usrname))
        return $usrname;
    else {
        return false;
    }
}

function checkCheckbox($cbx)
{
    //Purpose if the checkbox contains two letters
    if(count($cbx) == 1 && $cbx == "on")
        return true;
    else
        return false;
}

function checkEmail($email)
{
    //The function serialises the string and then uses
    //validation methods to check the email format
    $e = checkString($email);
    $e = filter_var($e, FILTER_VALIDATE_EMAIL);
    return $e;
}
 ?>
