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

        //Including a file that returns a list of objects.
        $objpath = $spacing . 'obj/getobjpath.func.php';
        include $objpath;
        $listOfObjPath = getObjPaths($num_of_dots);

        $errpath = $spacing . 'debug/turn_on_error_reporting.php';
        $dbpath = $spacing . 'conn_sess/dbconn.inc.php';
        $sesspath = $spacing . 'conn_sess/sess.inc.php';

        // echo "errpath: " . "$errpath";
        // echo "dbpath: " . "$dbpath";
        // echo "sesspath: " . "$sesspath";

        $listIncludes[] = $sesspath;
        $listIncludes[] = $dbpath;
        $listIncludes[] = $errpath;

        //mergin arrays
        $list = array_merge($listOfObjPath, $listIncludes);

        return $listIncludes;

        // echo 'include $sesspath;
        // include $dbpath;
        // include $errpath;
    }


 ?>
