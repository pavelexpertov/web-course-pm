<!-- This is an advanced search section where form elements (i.e. searchbar) are placed. -->
<?php
    include 'php/web_comp/event_type_ddlist.func.php';
    include 'php/web_comp/venue_ddlist.func.php';

 ?>
<div id="advancedsearch">
    <form action='search.php' method='get'>
        <label for="adv-search"> Search for events here</label>
        <input type="text" name="adv-search" id="adv-search">
        <input type="submit" value="Search">
        <br>
        <label>Venues:</label>
        <?php placeDDVenues("venueid", false, true); ?>
        <label>Event Type:</label>
        <?php placeDDEventTypes("evetype", false, true);?>
        <br>
        <label>Date:</label>
        <input type="text" id="date" name="date">
    </form>
</div>
