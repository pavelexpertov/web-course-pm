<?php
  //The purpose of the file is to insert (i.e. creating) a new event
  //
  include '../../web_comp/place_sess_db_include.func.php';
  $list = placeSDIncludes(2, true);
  foreach($list as $include)
    include $include;

  $columns = "ID, Name, Description, EManagerID";

  $query = "insert into Events($columns) values(0, ?, ?, ?)";

  $stmt = $mysqli->prepare($query);
  if($stmt == false)
  {
      echo "Ooop an error has happened at prepare statement line";
      exit();
  }
  $stmt->bind_param("ssi", $_POST['evename'], $_POST['descr'],
                    $_SESSION['usr']->id);
  $stmt->execute();
  $stmt->close();
  //Redirect user back to usr page
  header("Location: ../../../usr_page.php");
  exit()
?>
