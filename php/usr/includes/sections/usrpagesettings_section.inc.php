<div class="middle-section">
    <?php
        if(isset($_GET['pwd']))
            include 'php/usr/includes/web_comp/change_pwd_form.inc.php';
        elseif(isset($_GET['usrinfo']))
            include 'php/usr/includes/web_comp/change_pwd_form.inc.php';
        else
            header("Location: {$_SERVER['HTTP_REFERER']}");
     ?>
</div>
