<section id='login-section'>
    <h2>Login</h2>
    <?php
        $action = "php/cms/verifydata/check_logic_for_login.inc.php";
     ?>
    <form id="login-form" action='<?php echo $action; ?>' method='post'>
        <label for='usr'>Username</label>
        <input type='text' name='usr' id='usr'>
	<br>
        <label for='pwd'>Password</label>
        <input type='password' name='pwd' id='pwd'>
	<br>
        <input type='submit' value="Login">

    </form>

    <div class="error-section">
        <?php
            if(isset($_SESSION['err']))
            {
                echo "{$_SESSION['err']}";
            }

         ?>
    </div>

</section>
