<div id="category-list">
    <div class="category-item">
    <a href="">Create a new Event Type</a>
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
                <a href="">
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
<a href="">Create a new Venue </a>
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
                    ?>
                <a href="">
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
