<?php

include '../../web_comp/place_sess_db_include.func.php';
//include '../../obj/user.cs.php';
$list = placeSDIncludes(2);

foreach($list as $include)
{
    include $include;
}
if(isset($_SESSION['auth-err']))
    unset($_SESSION['auth-err']);
if(isset($_SESSION['auth']))
    unset($_SESSION['auth']);

$code = checkInt($_POST['code']);
$usrname = checkUsername($_POST['usr']);
$pwd = checkPassword($_POST['pwd']);
$listOfVars = array($code, $usrname, $pwd);
include '../../cms/verifydata/check_for_false_vars.inc.php';

$l = array("usr" => $usrname, "pwd" => $pwd);

$query = "select Password from Users where Username = ?";
$stmt = $mysqli->prepare($query);
if($stmt == false)
{
    echo "Some error happened";
    exit();
}
$stmt->bind_param("s", $usrname);
$stmt->execute();
$stmt->store_result();
$querynum = $stmt->num_rows;
if($querynum == 0)
{
    $_SESSION['auth'] = $l;
    $_SESSION['auth-err'] = "Your username or password is incorrect";
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}
else
{
    $stmt->bind_result($returnedpwd);
    $stmt->fetch();
    $stmt->close();
    if($returnedpwd != $pwd)
    {
        $_SESSION['auth'] = $l;
        $_SESSION['auth-err'] = "Your username or password is incorrect";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }
}

$query = "select Code from AuthCodes where Username = ?";
$stmt = $mysqli->prepare($query);
if($stmt == false)
{
    echo "Some error happened";
    exit();
}

$stmt->bind_param("s", $usrname);
$stmt->execute();
$stmt->store_result();
$querynum = $stmt->num_rows;
if($querynum == 0)
{
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}
else
{
    $stmt->bind_result($returnedcode);
    $stmt->fetch();
    $stmt->close();
    if($returnedcode != $code)
    {
        $_SESSION['auth'] = $l;
        $_SESSION['auth-err'] = "Your code is incorrect. Enter again.";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }
}

//if all successful then
$query = "update Users set Authenticated = 1 where Username = ?";
$stmt = $mysqli->prepare($query);
if($stmt == false)
{
    echo "Some error happened";
    exit();
}
$stmt->bind_param("s", $usrname);
$stmt->execute();
$stmt->close();
header("Location: ../../../index.php");
exit();
?>
