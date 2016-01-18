<?php
//The purpose of the file is to kick out the request if the guy does not have a legitimate
//session. Also it destroys err keyword in the session array.
if(isset($_SESSION['err']))
    unset($_SESSION['err']);

if(!isset($_SESSION['usr']))
{
    $_SESSION['err'] = "Oooops something happened in the process of kicking out unwanted people";
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}
 ?>
