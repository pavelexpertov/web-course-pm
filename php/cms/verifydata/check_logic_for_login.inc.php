<?php
    //Function that checks for the exising session variables.
    include 'php/cms/verifydata/check_vars_loginpage.func.php';


    //check the variables exist
    if(checkLoginVars())
    {
        $_SESSION['err'] = true;
        header("Location: $_SERVER['HTTP_REFEER']");
        exit();
    }

    
 ?>
