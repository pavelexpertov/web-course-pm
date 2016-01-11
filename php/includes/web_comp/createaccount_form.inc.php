<section>
    <form action="php/cms/insert/create_new_user.php" method="post">
        <label for="usrname">Enter your username</label>
        <input type="text" name="usrname" id="usrname">

        <label for="usrpwd">Enter your username</label>
        <input type="text" name="usrpwd" id="usrpwd">

        <label for="bio_cbx">Enter your username</label>
        <input type="checkbox" name="bio_cbx" id="bio_cbx">

        <textarea id="biodesc" name="biodesc"> </textarea>

        <input type="submit" value="Create an account">

<?php
    print_r($_POST);
?>
    </form>

    <div class="error-section">
        <?php if(isset($_SESSION['err'])) { ?>
            <p>
                <?php echo $_SESSION['err']; ?>
            </p>
        <?php } //End of the if statement ?>
    </div>


</section>
