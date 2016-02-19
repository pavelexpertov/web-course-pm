<div class="middle-section">
<div id="tabs">
    <ul>
        <?php
        if($_SESSION['usr']->eveadmin)
            echo '<li><a href="#tabs-1">Created Events</a></li>';
        ?>
        <li><a href="#tabs-2">Booked Events</a></li>
        <?php
        if($_SESSION['usr']->eveadmin)
            echo '<li><a href="#tabs-3">Manage Categories</a></li>';
        ?>
        <li><a href="#tabs-4">User Settings</a></li>
    </ul>
<?php
    //The section is used for the user to edit events, manage
    //bookings and edit user settings.
    //Includes a list of created events
    if($_SESSION['usr']->eveadmin)
        include 'php/usr/includes/web_comp/createdeventslist.inc.php';
    include 'php/usr/includes/web_comp/bookedeventslist.inc.php';
    if($_SESSION['usr']->eveadmin)
        include 'php/usr/includes/web_comp/categorylist.inc.php';
    include 'php/usr/includes/web_comp/usersettings.inc.php';
 ?>
</div>
</div>
