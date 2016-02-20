<?php
if(isset($_SESSION['pv']))
{
    //print_r($_SESSION['pv']);
    $pv = true;
    $fname = $_SESSION['pv']['fn'];
    $lname = $_SESSION['pv']['ln'];
    $email = $_SESSION['pv']['email'];
    $uname = $_SESSION['pv']['uname'];
    $upwd = $_SESSION['pv']['upwd'];
    $reppwd = $_SESSION['pv']['reppwd'];
    $job = $_SESSION['pv']['job'];
    if(isset($_SESSION['pv']['biodesc']))
        $biodesc = $_SESSION['pv']['biodesc'];
}
else
    $pv = false;

 ?>
<section>
    <form id="create-usr-account" action="php/cms/insert/create_new_user.php" method="post">
        <label for="fname">First Name</label>
        <input type="text" name="fname" id="fname" value="<?php if($pv) echo $fname;?>">
        <br>
        <label for="lname">Surname</label>
        <input type="text" name="lname" id="lname" value="<?php if($pv) echo $lname;?>">
        <br>
        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="<?php if($pv) echo $email;?>">
        <?php if(isset($_SESSION['em-err'])) { ?>
                <?php echo $_SESSION['em-err']; ?>
        <?php } //End of the if statement ?>
        <br>
        <label for="usrname">Enter your username</label>
        <input type="text" name="usrname" id="usrname" value="<?php if($pv) echo $uname;?>">
        <?php if(isset($_SESSION['usr-err'])) { ?>
                <?php echo $_SESSION['usr-err']; ?>
        <?php } //End of the if statement ?>
        <br>
        <label for="usrpwd">Enter your password</label>
        <input type="password" name="usrpwd" id="usrpwd" value="<?php if($pv) echo $upwd;?>">
        <br>
        <label for="reppwd">Repeat your password</label>
        <input type="password" name="reppwd" id="reppwd" value="<?php if($pv) echo $reppwd;?>">
        <br>
        <label for="job">Your current job/educational title</label>
        <input type="type" name="job" id="job" value="<?php if($pv) echo $job;?>">
        <br>
        <br>
        <input type="checkbox" name="bio_cbx" id="bio_cbx" <?php if($pv && isset($biodesc)) echo "checked";?>>
        <label for="bio_cbx">Check if you are an event manager and then fill in the box</label>
        <br>
        <br>
        <label>Enter your biography (optional)</label>
        <br>
        <textarea id="biodesc" name="biodesc"><?php if($pv && isset($biodesc)) echo $biodesc;?></textarea>
        <br>
        <input type="submit" value="Create user account">

    </form>
</section>
<?php
if(isset($_SESSION['usr-err']))
{
    unset($_SESSION['usr-err']);
}
if(isset($_SESSION['em-err']))
{
    unset($_SESSION['em-err']);
}
if(isset($_SESSION['pv']))
    unset($_SESSION['pv']);
 ?>
