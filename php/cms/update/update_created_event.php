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
  $query = "update Events set Name = ?, StartTime = ?
            where EManagerID = ? and ID = ?";

  $stmt = $mysqli->prepare($query);
  if($stmt == false)
  {
      echo "Ooop an error has happened at prepare statement line";
      exit();
  }
  $stmt->bind_param("ii", $_POST['evename'], $_POST['stime'],
                    $_SESSION['usr']->id, $_GET['eid']);
  $stmt->execute();
  $stmt->close();
  //Return the user to the userpage
  header("Location: {$_SERVER['HTTP_REFERER']}");
  exit();

 ?>
