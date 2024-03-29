<div id="tabs-3">
    <div class="category-item">
<h2>List of your Event Types</h2>
    <a href="create_event_type.php">Create a new Event Type</a>
<?php
    //The prupose of the file is to print out two section (in the order):
    //1. List of Event Types
    //2. List of Venues

    //Printing a Event Types list
    if($_SESSION['usr']->eveadmin != 2)
    {
    $query = "select ID, Name, Archived from EventTypes
     where ManagerID = {$_SESSION['usr']->id}";
 }
    else
    {
    //$query = "select ID, Name, Archived from EventTypes";
$fields = "EventTypes.ID as 'ID', EventTypes.Name as 'Name',
            EventTypes.Archived as 'Archived',
            Users.FirstName as 'fn', Users.LastName as 'ln'";

            $innerjoin = "inner join EventTypes
                        on EventTypes.ManagerID = Users.ID";
    $query = "select $fields from Users $innerjoin";


 }
    $stmt = $mysqli->query($query);
    $sumofqueries = mysqli_num_rows($stmt);
    if($sumofqueries > 0)
    {
        while($venue = $stmt->fetch_assoc())
        {
            ?>
            <h3>
                <a href="">
                    <?php echo $venue['Name']; ?>
                </a>
            </h3>
            <?php
                if($_SESSION['usr']->eveadmin == 2)
                {
                    echo "<p>";
                    echo "Type Creator: {$venue['fn']} " . $venue['ln'];
                    echo "</p>";
                }
             ?>
            <?php
    $elink = "edit_event_type.php?etid={$venue['ID']}";
    $dlink = "php/cms/delete/delete_event_type.inc.php?etid={$venue['ID']}";
    $rlink = "php/cms/update/restore_event_type.php?etid={$venue['ID']}";
            placeButton("Edit", $elink);
            if($venue['Archived'] != 1)
                placeButton("Delete", $dlink);
            else
                placeButton("Restore", $rlink);
        }//End of the while loop
    }//end of the if statement
    else {
        echo "<p>Oooops, looks like you haven't created any events </p>";
    }//end of the else statement
    //The div element below is for list of Event Types
 ?>
</div>
<div class="category-item">
<h2>List of your Venue Types</h2>
<a href="create_venue.php">Create a new Venue </a>
<?php

    //Printing a Venue Types list
    if($_SESSION['usr']->eveadmin != 2)
    {
    $query = "select ID, Name, Town, Address, Archived from Venues
     where ManagerID = {$_SESSION['usr']->id}";
 }
    else
    {
    //$query = "select ID, Name, Town, Address, Archived from Venues";
$fields = "Venues.ID as 'ID', Venues.Name as 'Name',
            Venues.Town as 'Town', Venues.Address as 'Address',
            Venues.Archived as 'Archived',
            Users.FirstName as 'fn', Users.LastName as 'ln'";

            $innerjoin = "inner join Venues
                        on Venues.ManagerID = Users.ID";
    $query = "select $fields from Users $innerjoin";
 }
    $stmt = $mysqli->query($query);
    $sumofqueries = mysqli_num_rows($stmt);
    if($sumofqueries > 0)
    {
        while($venue = $stmt->fetch_assoc())
        {
            ?>
            <h3>
                <?php echo $venue['Name']; ?>
            </h3>
            <?php
                if($_SESSION['usr']->eveadmin == 2)
                {
                    echo "<p>";
                    echo "Type Creator: {$venue['fn']} " . $venue['ln'];
                    echo "</p>";
                }
             ?>
    <?php
    $dlink = "php/cms/delete/delete_venue.inc.php?vid={$venue['ID']}";
    $elink = "edit_venue.php?vid={$venue['ID']}";
    $rlink = "php/cms/update/restore_venue.inc.php?vid={$venue['ID']}";
        placeButton("Edit", $elink);
        if($venue['Archived'] != 1)
            placeButton("Delete", $dlink);
        else
            placeButton("Restore", $rlink);
        }//End of the while loop
    }//end of the if statement
    else {
        echo "<p>Oooops, looks like you haven't created any events </p>";
    }//end of the else statement

//The div below is for the venue list
 ?>
</div>
</div>
