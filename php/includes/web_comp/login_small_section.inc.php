<div id="login-section">
    <?php
    if(!isset($_SESSION['usr'])){ ?>

    <a href='login.php'>Login (click)</a>
    <a href='create_account.php'>Create an account</a>

    <?php
} else { ?>

    <!-- <p>You logged in?</p> -->
    <h2><a href='usr_page.php'> <?php echo $_SESSION['usr']->usrname; ?> </a></h2>
    <a href='logout_logic.php'> log out </a>

    <?php }//End of the else clause?>
</div>
