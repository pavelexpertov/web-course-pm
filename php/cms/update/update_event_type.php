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
  $query = "update EventTypes set Name = ?, Description = ?
            where ManagerID = ? and ID = ?";

  $stmt = $mysqli->prepare($query);
  if($stmt == false)
  {
      echo "Ooop an error has happened at prepare statement line";
      echo $mysqli->error;
      exit();
  }

  $stmt->bind_param("ssii", $_POST['ename'],$_POST['descr'],
                    $_SESSION['usr']->id,$_POST['etid']);
  $stmt->execute();
  $stmt->close();
  //Return the user to the userpage
  header("Location: ../../../usr_page.php");
  exit();

 ?>
