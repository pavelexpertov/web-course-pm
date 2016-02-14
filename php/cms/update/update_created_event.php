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

  $eveid = $_POST['eid'];
  $evename = $_POST['evename'];
  $descr = $_POST['descr'];
  $stime = $_POST['stime'];
  $ftime = $_POST['ftime'];
  $date = convertDate($_POST['date']);
  $evetypeid = $_POST['evetype'];
  $venueid = $_POST['venueid'];

  $listOfVars = array($eveid, $evename, $descr, $date, $stime, $ftime,
                        $evetypeid, $venueid);

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
  //Return the user to the userpage
  header("Location: ../../../usr_page.php");
  exit();

 ?>
