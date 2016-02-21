<?php
    //This is for error reporting
    include '../../web_comp/place_sess_db_include.func.php';
    //include '../../obj/user.cs.php';
    $list = placeSDIncludes(2);

    foreach($list as $include)
    {
        include $include;
    }

    //Clear out the error variable
    if(isset($_SESSION['err']))
        unset($_SESSION['err']);

    //check the variables exist
    if(!isset($_POST['usr']) || !isset($_POST['pwd']))
    {
        $_SESSION['err'] = "Ooops, not enough variables been passed";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }

    $usrname = checkUsername($_POST['usr']);
    $usrpwd = checkPassword($_POST['pwd']);
    $listOfVars = array($usrname, $usrpwd);
    include 'php/cms/verifydata/check_for_false_vars.inc.php';

    $query = "select ID, Username, Password, EventAdmin, Authenticated from Users where Username = ?";
    $querystmt = $mysqli->prepare($query);
    $querystmt->bind_param('s', $usrname);
    if($querystmt == false){
        $_SESSION['err'] = "Some problem with prepared statement " . $querystmt->error_list;
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }
    $querystmt->execute();

    //Checking for a number of queries
    $querystmt->store_result();
    $usr_exist = $querystmt->num_rows;

    if($usr_exist == 0)
    {
        $msg = "Unfortunately incorrect username or password. Try again.";
        $l = array(
            'usr' => $usrname,
            'pwd' => $usrpwd,
            'msg' => $msg
        );
        $_SESSION['err'] = $l;
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }

    $querystmt->bind_result($usrid, $usrname2, $usrpwd2, $eveadm, $auth);
    $querystmt->fetch();
    $querystmt->close();
    if($usrpwd2 != $usrpwd)
    {
        //$_SESSION['err'] = "Unfortunately incorrect username or password. Try again.";
$msg = "Unfortunately incorrect username or password. Try again.";
        $l = array(
            'usr' => $usrname,
            'pwd' => $usrpwd,
            'msg' => $msg
        );
        $_SESSION['err'] = $l;
        header("Location: {$_SERVER['HTTP_REFERER']}");
        //echo "usrpwd from post value is: {$_POST['pwd']} <br>";
        //echo "usrpwd from query is: $usrpwd <br>";
        exit();
    }
    elseif($auth == 0)
    {
        $l = array( "usr" => $usrname, "pwd" => $usrpwd);
        $_SESSION['auth'] = $l;
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    }//End of the else clause
    elseif($usrname == "supersu")
    {
        $userobj = new User;
        $userobj->id = $usrid;
        $userobj->usrname = $usrname2;
        $userobj->usrpwd = $usrpwd2;
        $userobj->eveadmin = 2;
        $_SESSION['usr'] = $userobj;
        header("Location: ../../../index.php");
        exit();

    }
    else {
        $userobj = new User;
        $userobj->id = $usrid;
        $userobj->usrname = $usrname2;
        $userobj->usrpwd = $usrpwd2;
        if($eveadm == 0)
            $userobj->eveadmin = false;
        else
            $userobj->eveadmin = true;
        $_SESSION['usr'] = $userobj;
        header("Location: ../../../index.php");
        exit();

    }




 ?>
