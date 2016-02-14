<?php
    //This function will place include files of session and database
    //with appropriate leveling.

    function placeSDIncludes($num_of_dots = 0, $legituser = false)
    {
        $spacing = '';
        for($i = 0; $i < $num_of_dots; $i++)
        {
            $spacing = $spacing . '../';
        }

        //Including a file that returns a list of objects.
        $objpath = $spacing . 'obj/getobjpath.func.php';
        include $objpath;
        $listOfObjPath = getObjPaths($num_of_dots);

        $errpath = $spacing . 'debug/turn_on_error_reporting.php';
        $dbpath = $spacing . 'conn_sess/dbconn.inc.php';
        $sesspath = $spacing . 'conn_sess/sess.inc.php';
        $convertdate = $spacing . 'data_format/convert_date.func.php';

        $listIncludes[] = $sesspath;
        $listIncludes[] = $dbpath;
        $listIncludes[] = $errpath;
        $listIncludes[] = $convertdate;

        //If I want to check that the user is registered and logged in.
        if($legituser)
        {
            $legituserpath = $spacing . 'usr/verify/check_if_user_legit.inc.php';
            $listIncludes[] = $legituserpath;
        }

        //mergin arrays (user-defined objects first and then the paths to various scripts)
        $list = array_merge($listOfObjPath, $listIncludes);

        return $list;

    }


 ?>
