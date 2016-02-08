<?php
  //The purpose of the page is to get information about existing event type
  //and enter it into the form field elements for the user to edit
  //Creating a query
  $query = "select Name, Description from EventTypes where ID = ?";
  $stmt = $mysqli->prepare($query);
  if($stmt == false)
  {
    echo "Oooops, there's been an error while passing a query";
    echo $mysqli->error;
    //echo $stmt->error_list;
    exit();
  }
  $stmt->bind_param('i', $_GET['etid']);
  $stmt->execute();

  //Checking for a number of queries
  $stmt->store_result();
  $returnedquery = $stmt->num_rows;
  if($returnedquery != 1)
  {
    echo "One query has not returned. the value of query is $returnedquery";
    exit();
  }

  $stmt->bind_result($name, $descr);
  $stmt->fetch();
  $stmt->close();

 ?>
<form action="php/cms/update/update_event_type.php" method="post">
    <fieldset>
      <legend>Edit a new Event Type</legend>
      <label>Event Type name</label>
      <input type="text" id="ename" name="ename" value="<?php echo $name;?>">
      <label>Event's description</label>
      <textarea id="descr" name="descr"> <?php echo $descr;?></textarea>
      <input type="submit" value="Save Changes">
      <input type="hidden" name="etid" value="<?php echo $_GET['etid'];?>">
    </fieldset>
</form>
