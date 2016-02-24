<?php
  //The purpose of the document is to update data entries
  //for a certain event that belongs to the event manager (i.e. user)
  include '../../web_comp/place_sess_db_include.func.php';
  //include '../../obj/user.cs.php';
  $list = placeSDIncludes(2, true);
  foreach($list as $include)
    include $include;

  //The statement updates existing entries for event's data
  //The event's event's name and start time are updated
  $eveid = checkInt($_POST['eid']);
  $evename = checkString($_POST['evename']);
  $descr = checkString($_POST['descr']);
  $stime = checkTime($_POST['stime']);
  $ftime = checkTime($_POST['ftime']);
  $date = checkDateF($_POST['date']);
  $evetypeid = checkInt($_POST['evetype']);
  $venueid = checkInt($_POST['venueid']);

  $listOfVars = array($eveid, $evename, $descr, $date, $stime, $ftime,
                        $evetypeid, $venueid);
  include '../../cms/verifydata/check_for_false_vars.inc.php';

  $date = convertDate($date);
  if(!checkTimings($stime, $ftime))
  {
      $_SESSION['time_err'] = "You need to make starting time earlier than finishing time";
      header("Location: {$_SERVER['HTTP_REFERER']}");
      exit();
  }

  if($_SESSION['usr']->eveadmin != 2)
  {
  $columns = "Name = ?, Description = ?,
              Date = ?, StartTime = ?, FinishTime = ?,
              ConfType = ?, VenueID = ?";
  $query = "update Events set $columns
            where EManagerID = ? and ID = ?";

  $stmt = $mysqli->prepare($query);
  if($stmt == false)
  {
      echo "Ooop an error has happened at prepare statement line";
      exit();
  }
  $stmt->bind_param("sssssiiii", $evename, $descr,
                    $date, $stime, $ftime,
                    $evetypeid, $venueid,
                    $_SESSION['usr']->id, $eveid);
  $stmt->execute();
  $stmt->close();
  }
  else
  {
  $columns = "Name = ?, Description = ?,
              Date = ?, StartTime = ?, FinishTime = ?,
              ConfType = ?, VenueID = ?";
  $query = "update Events set $columns
            where ID = ?";

  $stmt = $mysqli->prepare($query);
  if($stmt == false)
  {
      echo "Ooop an error has happened at prepare statement line";
      exit();
  }
  $stmt->bind_param("sssssiii", $evename, $descr,
                    $date, $stime, $ftime,
                    $evetypeid, $venueid,
                    $eveid);
  $stmt->execute();
  $stmt->close();
  }
  //Return the user to the userpage
  header("Location: ../../../usr_page.php");
  exit();

 ?>
