<div id="login-section">
    <?php
    if(!isset($_SESSION['usr'])){ ?>

    <a href='login.php'>Login (click)</a>

    <?php
} else { ?>

    <!-- <p>You logged in?</p> -->
    <h2> <?php echo $_SESSION['usr']->usrname; ?> </h2>
    <a href=#> log out </a>

    <?php }//End of the else clause?>
</div>
