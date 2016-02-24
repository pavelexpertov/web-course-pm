<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    //Printing some important arrays
?>
<h4>List of Get variables</h4>
<?php print_r($_GET); ?>

<h4>List of POST variables</h4>
<?php print_r($_POST); ?>

<h4>List of USR variables</h4>
<?php
if(isset($_SESSION['usr']))
    var_dump($_SESSION);
/*if(isset($_SESSION['usr']))
{
    echo "name: " . $_SESSION['usr']->usr
}*/
?>
