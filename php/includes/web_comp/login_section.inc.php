<section id='login-section'>
    <h2>Login</h2>
    <?php
        $action = "php/cms/verifydata/check_logic_for_login.inc.php";
        $authaction = "php/cms/verifydata/check_for_authentication.php";
    if(isset($_SESSION['auth']))
    {
     ?>
    <form id="login-form" action='<?php echo $authaction; ?>' method='post'>
    <?php
    }//End of the if statmeent
    else
    {
        ?>
    <form id="login-form" action='<?php echo $action; ?>' method='post'>
        <?php
    }
     ?>
        <label for='usr'>Username</label>
        <input type='text' name='usr' id='usr'>
	<br>
        <label for='pwd'>Password</label>
        <input type='password' name='pwd' id='pwd'>
	<br>
        <?php
        if(isset($_SESSION['auth']))
        {
            ?>
        <label for='pwd'>Enter your code that's been sent to your email</label>
        <input type='password' name='pwd' id='pwd'>
        <?php
        }//End of the if
        ?>
	<br>

        <?php
        if(isset($_SESSION['auth']))
            echo '<input type="submit" value="Authenticate">';
        else
            echo '<input type="submit" value="Login">';
        ?>

    </form>

    <div class="error-section">
        <?php
            if(isset($_SESSION['err']))
            {
                echo "{$_SESSION['err']}";
            }
if(isset($_SESSION['auth']))
    unset($_SESSION['auth']);
         ?>
    </div>


</section>
