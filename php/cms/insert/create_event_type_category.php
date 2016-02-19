<?php
  //The purpose of the file is to insert (i.e. creating) a Event Type
  //
  include '../../web_comp/place_sess_db_include.func.php';
  $list = placeSDIncludes(2, true);
  foreach($list as $include)
    include $include;

  $ename = checkString($_POST['ename']);
  $descr = checkString($_POST['descr']);
  $listOfVars = array($ename, $descr);
  include '../../cms/verifydata/check_for_false_vars.inc.php';

  $columns = "ID, Name, Description, ManagerID";

  $query = "insert into EventTypes($columns)
            values(0, ?, ?, ?)";


  $stmt = $mysqli->prepare($query);
  if($stmt == false)
  {
      echo "Ooop an error has happened at prepare statement line";
      echo "<br>"; echo $mysqli->error;
      exit();
  }
  $stmt->bind_param("ssi", $ename, $descr, $_SESSION['usr']->id);
  $stmt->execute();
  $stmt->close();
  //Redirect user back to usr page
  header("Location: ../../../usr_page.php");
  exit()
?>
