    <?php
    if(!isset($_SESSION['usr'])){ ?>

    <li><a href='login.php'>Sign In</a></li>
    <li><a href='create_account.php'>Sign up</a></li>

    <?php
} else { ?>

    <!-- <p>You logged in?</p> -->
    <li><a href='usr_page.php'><?php echo $_SESSION['usr']->usrname; ?></a></li>
    <li><a href='logout_logic.php'> log out </a></li>

    <?php }//End of the else clause?>
