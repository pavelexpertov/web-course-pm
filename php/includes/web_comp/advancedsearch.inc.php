<!-- This is an advanced search section where form elements (i.e. searchbar) are placed. -->
<?php
    include 'php/web_comp/event_type_ddlist.func.php';
    include 'php/web_comp/venue_ddlist.func.php';

 ?>
<div id="advancedsearch">
    <form action='search.php' method='get'>
        <label for="adv-search"> Search for events here</label>
        <input type="text" name="adv-search" id="adv-search"
        <?php if(isset($_GET['adv-search'])) echo "value=\"{$_GET['adv-search']}\"";?>>
        <input type="submit" value="Search">
        <br>
        <label>Venues:</label>
        <?php
        if(isset($_GET['venueid']))
            placeDDVenues("venueid", $_GET['venueid'], true);
        else
            placeDDVenues("venueid", false, true);

        ?>
        <label>Event Type:</label>
        <?php
        if(isset($_GET['evetype']))
            placeDDEventTypes("evetype", $_GET['evetype'], true);
        else
            placeDDEventTypes("evetype", false, true);
        ?>
        <br>
        <label>Date:</label>
        <input type="text" id="date" name="date" <?php if(isset($_GET['date'])) echo "value=\"{$_GET['date']}\"";?>>
    </form>
</div>
