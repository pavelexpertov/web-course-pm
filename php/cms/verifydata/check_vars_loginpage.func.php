<?php
    //The purpose of the this function is to check if all
    //appropriate session variables exist for check

    function checkLoginVars()
    {
        //Returns true if they exist otherwise false
        if(!isset($_POST['usr']) || !isset($_POST['pwd']))
        {
            return false;
        }
        else {
            return true;
        }
    }
 ?>
