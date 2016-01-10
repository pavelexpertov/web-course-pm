<section id='login-section'>
    <h2>Login</h2>
    <?php
        $action = "php/cms/verifydata/check_logic_for_login.inc.php";
     ?>
    <form action='<?php echo $action; ?>' method='post'>
        <label for='usr'>Username</label>
        <input type='text' name='usr' id='usr'>
        <label for='pwd'>Password</label>
        <input type='text' name='pwd' id='pwd'>
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
