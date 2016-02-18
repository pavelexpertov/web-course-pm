<?php
include 'php/web_comp/time_ddlist.func.php';
include 'php/web_comp/venue_ddlist.func.php';
include 'php/web_comp/event_type_ddlist.func.php';

?>
<form id="create-event" action="php/cms/insert/create_new_event.php" method="post">
    <fieldset>
      <legend>Create a new event</legend>
      <label>Event name</label>
      <input type="text" id="evename" name="evename">
      <br>
      <label>Event description</label>
      <textarea id="descr" name="descr"></textarea>
      <br>
      <label>Date</label>
      <input type="text" id="date" name="date">
      <br>
      <label>Start Time</label>
      <?php placeDDTime("stime"); ?>
      <br>
      <label>Finish Time</label>
      <?php placeDDTime("ftime"); ?>
      <br>
      <?php
      if(isset($_SESSION['time_err']))
      {
          ?>
          <br><?php echo $_SESSION['time_err']; ?> <br>
         <?php
     }//End of the if statement
       ?>
      <label>Event Type</label>
      <?php placeDDEventTypes("evetype"); ?>
      <br>

      <label>Venue</label>
      <?php placeDDVenues("venueid"); ?>
      <input type="submit" value="Create a new event">
    </fieldset>


</form>
