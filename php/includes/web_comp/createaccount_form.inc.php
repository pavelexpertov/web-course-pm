<section>
    <form id="create-usr-account" action="php/cms/insert/create_new_user.php" method="post">
        <label for="fname">First Name</label>
        <input type="text" name="fname" id="fname">
        <br>
        <label for="lname">Surname</label>
        <input type="text" name="lname" id="lname">
        <br>
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
        <br>
        <label for="usrname">Enter your username</label>
        <input type="text" name="usrname" id="usrname">
        <?php if(isset($_GET['ue'])) { ?>
            <p>
                <?php echo $_GET['ue']; ?>
            </p>
        <?php } //End of the if statement ?>
        <br>
        <label for="usrpwd">Enter your password</label>
        <input type="text" name="usrpwd" id="usrpwd">
        <br>
        <label for="reppwd">Repeat your password</label>
        <input type="text" name="reppwd" id="reppwd">
        <br>
        <label for="job">Your current job/educational title</label>
        <input type="text" name="job" id="job">
        <br>
        <br>
        <input type="checkbox" name="bio_cbx" id="bio_cbx">
        <label for="bio_cbx">Check if you are an event manager and then fill in the box</label>
        <br>
        <br>
        <label>Enter your biography (optional)</label>
        <br>
        <textarea id="biodesc" name="biodesc"></textarea>
        <br>
        <input type="submit" value="Create user account">

    </form>
</section>
