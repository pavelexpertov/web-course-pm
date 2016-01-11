<?php
//The purpose of the page is to collect some needed information before creating
//an account and then create an account using the insert statement
include '../../web_comp/place_sess_db_include.func.php';
// include '../../obj/user.cs.php';
$listOfIncludes = placeSDIncludes(2);
foreach($listOfIncludes as $include)
    include $include;

//First stage is to collect some needed info to check against (i.e. existing username)
$query = "select Username from Users where Username = ?";
$usrnamestmt = $mysqli->prepare($query);
$usrnamestmt->bind_param('s', $_POST['usrname']);
$usrnamestmt->execute();
$usrnamestmt->store_result();
$numOfQueries = $usrnamestmt->num_rows;
$usrnamestmt->bind_result($existusrname);
if($numOfQueries == 1)
{
    $_SESSION['err'] = "The username already exists";
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}
elseif($numOfQueries > 1)
{
    $_SESSION['err'] = "For some reason you got more than one query you asked for, for username";
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}

//Second stage is to compare the usrname against the post's



 ?>
