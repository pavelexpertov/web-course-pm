<?php
  //The purpose of the page is to get information about existing event
  //and enter it into the form field elements for the user to edit
  //Creating a query
    include 'php/web_comp/time_ddlist.func.php';
    include 'php/web_comp/venue_ddlist.func.php';
    include 'php/web_comp/event_type_ddlist.func.php';
    include 'php/web_comp/button_element.func.php';
    include 'php/data_format/truncate_time.func.php';
    include 'php/data_format/convert_date.func.php';
    include 'php/cms/verifydata/valid_serial_data.func.php';

    /*if(isset($_SESSION['time_err']))
        unset($_SESSION['time_err']);*/

  $eveid = checkInt($_GET['eid']);

  $listOfVars = array();
  $listOfVars[] = $eveid;
    include 'php/cms/verifydata/check_for_false_vars.inc.php';

  $columns = "Name, Description,
              Date, StartTime, FinishTime,
              ConfType, VenueID";
  $query = "select $columns from Events where ID = ?";
  $stmt = $mysqli->prepare($query);
  if($stmt == false)
  {
    echo "Oooops, there's been an error while passing a query";
    echo $stmt->error_list;
    exit();
  }
  $stmt->bind_param('i', $eveid);
  $stmt->execute();

  //Checking for a number of queries
  $stmt->store_result();
  $returnedquery = $stmt->num_rows;
  if($returnedquery != 1)
  {
    echo "One query has not returned. the value of query is $returnedquery";
    exit();
  }

  $stmt->bind_result($evename, $evedescr,
                     $date, $stime, $ftime,
                     $evetype, $venueid );
  $stmt->fetch();
  $stmt->close();

 ?>


<form id="create-event" action="php/cms/update/update_created_event.php" method="post">
    <fieldset>
      <legend>Create a new event</legend>
      <label>Event name</label>
      <input type="text" id="evename" name="evename" value="<?php echo $evename;?>">
      <br>
      <label>Event description</label>
      <textarea id="descr" name="descr"><?php echo $evedescr;?></textarea>
      <br>
      <label>Date</label>
      <input type="text" id="date" name="date" value="<?php echo convertIsoDate($date);?>">
      <br>
      <label>Start Time</label>
      <?php placeDDTime("stime", truncateTime($stime)); ?>
      <br>
      <label>Finish Time</label>
      <?php placeDDTime("ftime", truncateTime($ftime)); ?>
      <br>
      <?php if(isset($_SESSION['time_err']))
      {
          ?>
          <p><?php echo $_SESSION['time_err']; ?></p>
          <?php
      }
      ?>
      <label>Event Type</label>
      <?php placeDDEventTypes("evetype"); ?>
      <br>
      <label>Venue</label>
      <?php placeDDVenues("venueid"); ?>
      <br>
      <input type="hidden" name="eid" id="eid" value="<?php echo $eveid; ?>">
      <input type="submit" value="Save changes">
      <?php placeButton("Cancel", "usr_page.php");?>
    </fieldset>


</form>




<!-- <form action="php/cms/update/update_created_event.php" method="post">
  <fieldset>
    <legend>Edit your event</legend>
    <label> Event Name</label>
    <input type="text" name="evename" id="evename" value = "<?php echo $evename; ?>" >
    <textarea name="descr" id="descr"><?php echo $evedescr; ?> </textarea>
    <input type="hidden" name="eid" id="eid" value="<?php echo $eveid; ?>">
    <input type="submit" value="Send the changes">
  </fieldset>
</form>-->
