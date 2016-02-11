<div id="category-list">
    <div class="category-item">
<h2>List of your Event Types</h2>
    <a href="create_event_type.php">Create a new Event Type</a>
<?php
    //The prupose of the file is to print out two section (in the order):
    //1. List of Event Types
    //2. List of Venues

    //Printing a Event Types list
    $query = "select ID, Name, Archived from EventTypes
     where ManagerID = {$_SESSION['usr']->id}";
    $stmt = $mysqli->query($query);
    $sumofqueries = mysqli_num_rows($stmt);
    if($sumofqueries > 0)
    {
        while($venue = $stmt->fetch_assoc())
        {
    $link = "php/cms/delete/delete_event_type.inc.php?etid={$venue['ID']}";
            ?>
            <h3>
                <a href="">
                    <?php echo $venue['Name']; ?>
                </a>
            </h3>
            <p>
            <?php
                if($venue['Archived'] != 1) {

                    ?>
                <a href="<?php echo $link; ?>">
                    Delete
                </a>
                    <?php
                }
                else {
                ?>
                <a href="">
                    Restore
                </a>
                <?php
                }
             ?>
             </p>
            <p>
    <a href="edit_event_type.php?etid=<?php echo $venue['ID'];?>">
        Edit
    </a>
            </p>
            <?php
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
    $query = "select ID, Name, Town, Address, Archived from Venues
     where ManagerID = {$_SESSION['usr']->id}";
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
            <p>
            <?php
                if($venue['Archived'] != 1) {
    $link = "php/cms/delete/delete_venue.inc.php?vid={$venue['ID']}";
                    ?>
                <a href="<?php echo $link; ?>">
                    Delete
                </a>
                    <?php
                }
                else {
                ?>
                <a href="">
                    Restore
                </a>
                <?php
                }
             ?>
             </p>
            <p>
    <a href="edit_venue.php?vid=<?php echo $venue['ID'];?>">
        Edit
    </a>
            </p>

            <?php
        }//End of the while loop
    }//end of the if statement
    else {
        echo "<p>Oooops, looks like you haven't created any events </p>";
    }//end of the else statement

//The div below is for the venue list
 ?>
</div>
</div>
