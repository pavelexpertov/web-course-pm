<?php
    //This function will place include files of session and database
    //with appropriate leveling.

    function placeSDIncludes($num_of_dots = 0)
    {
        $spacing = '';
        for($i = 0; $i < $num_of_dots; $i++)
        {
            $spacing = $spacing . '../';
        }

        $usrcs = $spacing . 'obj/user.cs.php';
        $errpath = $spacing . 'debug/turn_on_error_reporting.php';
        $dbpath = $spacing . 'conn_sess/dbconn.inc.php';
        $sesspath = $spacing . 'conn_sess/sess_without_classes.inc.php';

        // echo "errpath: " . "$errpath";
        // echo "dbpath: " . "$dbpath";
        // echo "sesspath: " . "$sesspath";

        $listIncludes[] = $usrcs;
        $listIncludes[] = $sesspath;
        $listIncludes[] = $dbpath;
        $listIncludes[] = $errpath;

        return $listIncludes;

        // echo 'include $sesspath;
        // include $dbpath;
        // include $errpath;
    }


 ?>
