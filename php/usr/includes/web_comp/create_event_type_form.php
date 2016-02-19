<?php include 'php/web_comp/button_element.func.php';?>
<form action="php/cms/insert/create_event_type_category.php" method="post">
    <fieldset>
      <legend>Create a new Event Type</legend>
      <label>Event Type name</label>
      <input type="text" id="ename" name="ename">
      <br>
      <label>Event's description</label>
      <br>
      <textarea id="descr" name="descr"></textarea>
      <br>
      <input type="submit" value="Create a new event type">
      <?php placeButton("Cancel", "usr_page.php");?>
    </fieldset>
</form>
