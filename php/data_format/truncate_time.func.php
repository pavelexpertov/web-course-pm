<?php
//The purose of the function is to truncate passed time from database

function truncateTime($passedtime)
{
    $time = substr($passedtime, 0, 5);
    return $time;
}

 ?>
