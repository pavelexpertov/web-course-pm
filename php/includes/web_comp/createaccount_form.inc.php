<section>
    <form id="create-usr-account" action="php/cms/insert/create_new_user.php" method="post">
        <label for="usrname">Enter your username</label>
        <input type="text" name="usrname" id="usrname">
        <br>
        <label for="usrpwd">Enter your password</label>
        <input type="text" name="usrpwd" id="usrpwd">
        <br>
        <label for="reppwd">Repeat your password</label>
        <input type="text" name="reppwd" id="reppwd">
        <br>
        <br>
        <input type="checkbox" name="bio_cbx" id="bio_cbx">
        <label for="bio_cbx">Check if you are an event manager and then fill in the box</label>
        <br>
        <label>Enter your biography (optional)</label>
        <br>
        <textarea id="biodesc" name="biodesc"></textarea>
        <br>
        <input type="submit" value="Create user account">

    </form>

    <div class="error-section">
        <?php if(isset($_SESSION['err'])) { ?>
            <p>
                <?php echo $_SESSION['err']; ?>
            </p>
        <?php } //End of the if statement ?>
    </div>


</section>
