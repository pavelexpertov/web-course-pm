<?php
    //This function will place include files of object files
    //with appropriate leveling.

    function getObjPaths($num_of_dots = 0)
    {
        $spacing = '';
        for($i = 0; $i < $num_of_dots; $i++)
        {
            $spacing = $spacing . '../';
        }

        $usr = $spacing . 'obj/user.cs.php';

        $listIncludes[] = $usr;

        return $listIncludes;

    }


 ?>
