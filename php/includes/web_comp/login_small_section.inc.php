<div id="login-section">
    <?php
    if(!isset($_SESSION['user'])){ ?>

    <a href='#'>Login (click)</a>

    <?php
} else { ?>

    <p>You logged in?</p>

    <?php }//End of the else clause?>
</div>
